<?php
$admin_file = '2026/application/controllers/Admin.php';
$content = file_get_contents($admin_file);

// Add the new _v2 methods before the closing brace
$new_methods = <<<METHOD

    public function meritlist_v2() {
        \$data = array(
            'breadcrumb' => array('Merit List V2' => ''),
            'title' => 'Merit List V2',
            'sub_title' => '',
            'page' => 'admin/meritlist_v2',
            'treeview' => 'meritlist',
            'class' => \$this->General_model->selectData('class'),
        );

        \$this->load->view('admin/layout', \$data);
    }

    public function printmeritlist_v2() {
        if (\$this->input->post()) {
            \$post = \$this->security->xss_clean(\$this->input->post());
            \$exam_id = isset(\$post['exam_id']) ? \$post['exam_id'] : 'final';

            \$students = \$this->General_model->selectData('students', array('class' => \$post['class']), array('id', 'name_bn', 'class', 'year', 'class_roll', 'section', 'subject', 'result', 'gpa', 'mark'));

            \$processed_students = array();

            foreach (\$students as \$row) {
                // Parse the dynamic JSON
                \$result_json = json_decode(\$row->result, true);

                \$dynamic_gpa = 0.00;
                \$dynamic_mark = 0;

                if (\$exam_id == 'final') {
                    // Yearly Final uses the root GPA and Mark
                    \$dynamic_gpa = \$row->gpa;
                    \$dynamic_mark = \$row->mark;
                } else {
                    // Term specific
                    if (isset(\$result_json[\$exam_id])) {
                        \$dynamic_gpa = isset(\$result_json[\$exam_id]['gpa']) ? \$result_json[\$exam_id]['gpa'] : 0.00;
                        \$dynamic_mark = isset(\$result_json[\$exam_id]['5']['1']) ? \$result_json[\$exam_id]['5']['1'] : 0;
                    }
                }

                // Assign dynamic values to the object so the view can use them seamlessly
                \$row->dynamic_gpa = \$dynamic_gpa;
                \$row->dynamic_mark = \$dynamic_mark;
                \$row->exam_id = \$exam_id;

                \$processed_students[] = \$row;
            }

            // Sort students dynamically in PHP (GPA DESC, Mark DESC, Section ASC, Roll ASC)
            usort(\$processed_students, function(\$a, \$b) {
                if (\$a->dynamic_gpa != \$b->dynamic_gpa) {
                    return (\$a->dynamic_gpa < \$b->dynamic_gpa) ? 1 : -1;
                }
                if (\$a->dynamic_mark != \$b->dynamic_mark) {
                    return (\$a->dynamic_mark < \$b->dynamic_mark) ? 1 : -1;
                }
                if (\$a->section != \$b->section) {
                    return strcmp(\$a->section, \$b->section);
                }
                return (\$a->class_roll < \$b->class_roll) ? -1 : 1;
            });

            \$data = array(
                'class' => \$post['class'],
                'exam_id' => \$exam_id,
                'students' => \$processed_students,
            );
            \$this->load->view('admin/printmeritlist_v2', \$data);
        } else {
            redirect('admin/meritlist_v2');
        }
    }

}
METHOD;

$content = preg_replace('/\}\s*$/', $new_methods, $content);
file_put_contents($admin_file, $content);
echo "Admin.php patched successfully.\n";
?>
