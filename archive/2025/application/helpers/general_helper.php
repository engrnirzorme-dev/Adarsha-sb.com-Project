<?php

if (!function_exists('toBangla')) {

    function toBangla($number = null) {
        $data = array(
            '0' => '০',
            '1' => '১',
            '2' => '২',
            '3' => '৩',
            '4' => '৪',
            '5' => '৫',
            '6' => '৬',
            '7' => '৭',
            '8' => '৮',
            '9' => '৯'
        );
        $unicode = '';
        for ($i = 0; $i < strlen($number); $i++) {
            $char = substr($number, $i, 1);
            $unicode .= isset($data[$char]) ? $data[$char] : $char;
        }
        return $unicode;
    }

}



if (!function_exists('check_request_url')) {

    function check_request_url($url = '') {
        $ci = & get_instance();
        $request_url = $ci->input->server('HTTP_REFERER');
        $request_url = str_replace("http:", "", $request_url);
        $request_url = str_replace("https:", "", $request_url);

        $url = str_replace("http:", "", $url);
        $url = str_replace("https:", "", $url);
        if (strtolower($request_url) != strtolower($url)) {
            redirect($url);
            exit();
        }
    }

}


if (!function_exists('menu_table')) {

    function menu_table($data = array()) {
        $menu_data = array();
        foreach ($data as $row) {
            $menu_data[$row->root][] = $row;
        }
        $output = menu_table_data($menu_data, '0', '');
        return $output;
    }

}

if (!function_exists('menu_table_data')) {

    function menu_table_data($menu_data = array(), $parentID = '0', $parentName = '', $selectedID = '') {
        $output = '';
        if (isset($menu_data[$parentID]) && is_array($menu_data[$parentID]) && count($menu_data[$parentID]) > 0) {
            $data = $menu_data[$parentID];
            foreach ($data as $key => $val) {
                $output .= '<tr><td>' . $parentName . ucwords($val->menu_en) . '</td></tr>';
                if (isset($menu_data[$val->id]) && is_array($menu_data[$val->id]) && count($menu_data[$val->id]) > 0) {
                    $output .= menu_table_data($menu_data, $val->id, $parentName . ucwords($val->menu_en) . ' > ');
                }
            }
        }
        return $output;
    }

}




if (!function_exists('website_menu')) {

    function website_menu($data = array()) {
        $menu_data = array();
        $parent_info = array();
        foreach ($data as $row) {
            $menu_data[$row->root][] = $row;
        }
        $output = '';
        $color_sl = 0;
        if (isset($menu_data['0']) && is_array($menu_data['0']) && count($menu_data['0']) > 0) {
            $output .= '<ul class="nicdark_menu nicdark_margin010 nicdark_padding50" style="float: none;">';
            foreach ($menu_data['0'] as $key1 => $val1) {
                $output .= '<li class="' . menu_color($color_sl % 6) . '"> <a href="' . menu_url($val1) . '">' . ucwords($val1->menu_en) . '</a>';
                if (isset($menu_data[$val1->id]) && is_array($menu_data[$val1->id]) && count($menu_data[$val1->id]) > 0) {
                    $output .= '<ul class="sub-menu">';
                    foreach ($menu_data[$val1->id] as $key2 => $val2) {
                        $output .= '<li > <a href="' . menu_url($val2) . '">' . ucwords($val2->menu_en) . '</a>';
                        if (isset($menu_data[$val2->id]) && is_array($menu_data[$val2->id]) && count($menu_data[$val2->id]) > 0) {
                            $output .= '<ul class="sub-menu">';
                            foreach ($menu_data[$val2->id] as $key3 => $val3) {
                                $output .= '<li > <a href="' . menu_url($val3) . '">' . ucwords($val3->menu_en) . '</a></li>';
                            }
                            $output .= '</ul>';
                        }
                        $output .= '</li>';
                    }
                    $output .= '</ul>';
                }
                $output .= '</li>';
                $color_sl++;
            }
            $output .= '</ul>';
        }
        return $output;
    }

}



if (!function_exists('menu_url')) {

    function menu_url($data = array()) {
        if ($data->type == '1') {
            return 'javascript:void(0)';
        } elseif ($data->type == '2') {
            return $data->url;
        } else {
            return site_url() . 'website/cms/' . $data->id . '/' . $data->menu_en . '.html';
        }
    }

}



if (!function_exists('select_data')) {

    function select_data($data, $key = array(), $field = array()) {
        if (!is_array($key)) {
            $key = explode(",", $key);
        }
        if (!is_array($field)) {
            $field = explode(",", $field);
        }
        $output = array();
        foreach ($data as $value) {
            $value = json_decode(json_encode($value), true);
            $index = '';
            $val = '';
            foreach ($key as $fn) {
                $index .= $value[$fn] . '_';
            }
            foreach ($field as $fn) {
                $val .= $value[$fn] . ' | ';
            }
            $index = trim($index, '_');
            $val = trim($val, ' | ');
            $output[$index] = $val;
        }
        return $output;
    }

}



if (!function_exists('find_input')) {

    function find_input($field = '', $find = array(), $table_id = '', $class = '') {
        $table_id = "'" . $table_id . "'";
        return '<input type="text" class="form-control find_field ' . $class . '" data-field="' . $field . '"  value="' . ( isset($find[$field]) ? $find[$field] : '') . '" onkeydown="Javascript: if (event.keyCode == 13) find_data(' . $table_id . ', 1);">';
    }

}

if (!function_exists('find_select')) {

    function find_select($field = '', $find = array(), $data = array()) {
        $value = ( isset($find[$field]) ? $find[$field] : '');
        return '<select class="form-control find_field" data-field="' . $field . '">' . select_option($data, $value) . '</select>';
    }

}


if (!function_exists('bd_date')) {

    function bd_date($enDate = '') {
        if (strlen($enDate) == 10) {
            return substr($enDate, 8, 2) . '-' . substr($enDate, 5, 2) . '-' . substr($enDate, 0, 4);
        } else {
            return $enDate;
        }
    }

}


if (!function_exists('to_bangla')) {

    function to_bangla($number = null) {
        $data = array(
            '0' => '০',
            '1' => '১',
            '2' => '২',
            '3' => '৩',
            '4' => '৪',
            '5' => '৫',
            '6' => '৬',
            '7' => '৭',
            '8' => '৮',
            '9' => '৯'
        );
        $unicode = '';
        for ($i = 0; $i < strlen($number); $i++) {
            $char = substr($number, $i, 1);
            $unicode .= isset($data[$char]) ? $data[$char] : $char;
        }
        return $unicode;
    }

}

if (!function_exists('send_sms')) {

    function send_sms($number = '', $msgr = '') {
        $result = '';
        /*
          $number = '88' . $number;
          $msg = str_replace(' ', '+', $msgr);
          $msg = str_replace('$', '%24', $msg);
          $msg = str_replace('%', '%25', $msg);
          $msg = str_replace('^', '%5E', $msg);
          $msg = str_replace('&', '%26', $msg);
          $msg = str_replace('=', '%3D', $msg);
          $msg = str_replace('\n', '%5Cn', $msg);
          $msg = str_replace('"', '%22', $msg);
          $ApiURL='http://brandsms.mimsms.com/smsapi?api_key=C20040295d122ebcb26e80.73614483&type=text&contacts='.$number.'&senderid=JashorBoard&msg='.$msg;
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $ApiURL);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          $result = curl_exec($ch);
          if (!$result) {
          $result = curl_error();
          }
          curl_close($ch);
         */
        $ci = & get_instance();
        $ci->db->insert('admin.sms_log', array('mobile' => $number, 'text' => $msgr, 'feedback' => $result));
        return $result;
    }

}



if (!function_exists('to_array')) {

    function to_array($data, $key = array()) {
        if (!is_array($key)) {
            $key = explode(",", $key);
        }
        $output = array();
        foreach ($data as $value) {
            $value = json_decode(json_encode($value), true);
            $index = '';
            foreach ($key as $fn) {
                $index .= $value[$fn] . '_';
            }
            $index = trim($index, '_');
            $output[$index] = $value;
        }
        return $output;
    }

}

if (!function_exists('select_option')) {

    function select_option($data = array(), $value = '', $id = '') {
        $str = '';
        if (!is_array($value)) {
            $str .= '<option value="">Select</option>';
        }
        foreach ($data as $key => $sel) {
            if ((is_array($value) && in_array($key, $value)) || $key == $value) {
                $str .= '<option id="option_' . $key . '"  selected="" value="' . $key . '" >' . $sel . '</option>';
            } else {
                $str .= '<option id="option_' . $id . '_' . $key . '"  value="' . $key . '" >' . $sel . '</option>';
            }
        }
        return $str;
    }

}



if (!function_exists('allclass')) {

    function allclass($key = NULL) {
        $data = array(
            '1' => 'প্লে ',
            '2' => 'নার্সারী',
            '3' => 'কেজি ',
            '4' => 'প্রথম ',
            '5' => 'দ্বিতীয় ',
            '6' => 'তৃতীয়',
            '7' => 'চতুর্থ',
            '8' => 'পঞ্চম '
        );
        return data_return($data, $key);
    }

}


if (!function_exists('exam')) {

    function exam($key = NULL) {
        $data = array(
            '1' => 'প্রথম মূল্যায়ন ',
            '2' => 'দ্বিতীয় মূল্যায়ন  ',
            '3' => 'চূড়ান্ত মূল্যায়ন '
        );
        return data_return($data, $key);
    }

}


if (!function_exists('mark_type')) {

    function mark_type($key = NULL) {
        $data = array(
            '1' => 'রচনামূলক  / শ্রুতলিপি / কসরৎ',
            '2' => 'পাক্ষিক পরীক্ষা / চিত্রাংকন / নি. পোশাক ও পরিচ্ছন্নতা  ',
            '3' => 'বাড়ীর কাজ  / পাক্ষিক পরীক্ষা'
        );
        return data_return($data, $key);
    }

}

if (!function_exists('show_mark')) {

    function show_mark($exam = array(), $result = array(), $exam_id = '', $sub_code = '', $type_id = '', $mark_type = '', $show_type = '1') {
        if (isset($exam[$exam_id])) {

            $mark = $result[$exam_id][$sub_code][$type_id][$mark_type];

            if (trim($mark) == '' OR strtolower(trim($mark)) == 'x') {
                return '';
            } elseif (strtolower(trim($mark)) == 'a') {
                if ($show_type == 1) {
                    return 'A';
                } elseif ($show_type == 2) {
                    return 0;
                } else {
                    return '';
                }
            } else {
                return $mark;
            }
        } else {
            return '';
        }
    }

}

if (!function_exists('gp')) {

    function gp($key = NULL) {
        $data = array(
            'A+' => 5.00,
            'A' => 4.00,
            'A-' => 3.50,
            'B' => 3.00,
            'C' => 2.00,
            'F' => 0.00,
            'X' => 0.00
        );
        return data_return($data, $key);
    }

}

if (!function_exists('gl')) {

    function gl($full_mark = 100, $mark = 0) {
        $mark = floor(($mark * 100) / $full_mark);
        if ($mark > 100) {
            return 'X';
        } elseif ($mark >= 80) {
            return 'A+';
        } elseif ($mark >= 70) {
            return 'A';
        } elseif ($mark >= 60) {
            return 'A-';
        } elseif ($mark >= 50) {
            return 'B';
        } elseif ($mark >= 40) {
            return 'C';
        } else {
            return 'F';
        }
    }

}

if (!function_exists('gla')) {

    function gla($gpa = 0) {

        if ($gpa >= 5.00) {
            return 'A+';
        } elseif ($gpa >= 4.00) {
            return 'A';
        } elseif ($gpa >= 3.50) {
            return 'A-';
        } elseif ($gpa >= 3.00) {
            return 'B';
        } elseif ($gpa >= 2.00) {
            return 'C';
        } elseif ($gpa >= 1.00) {
            return 'D';
        } else {
            return 'F';
        }
    }

}


if (!function_exists('mark_per')) {

    function mark_per($mark = 0, $exam_id = '') {
        $per = 100;
        if ($exam_id == 1) {
            $per = 20;
        } elseif ($exam_id == 2) {
            $per = 30;
        } elseif ($exam_id == 3) {
            $per = 50;
        }
        return number_format((float) (($mark * $per) / 100), 2, '.', '');
    }

}


if (!function_exists('section')) {

    function section($key = NULL) {
        $data = array(            '1' => 'শাপলা ',            '2' => 'গোলাপ ',            '3' => 'বেলী '
        );
        return data_return($data, $key);
    }

}



if (!function_exists('status')) {

    function status($key = NULL) {
        $data = array(
            '1' => 'Active',
            '2' => 'Inactive'
        );
        return data_return($data, $key);
    }

}

if (!function_exists('intDecimal')) {

    function intDecimal($n = NULL) {
        $x = (int)round($n);
		if($x == $n){
			return $x;
		}else{
			return $n;
		}
    }

}



if (!function_exists('day')) {

    function day($key = NULL) {
        $data = array(
            0 => 'Sunday',
            1 => 'Monday',
            2 => 'Tuesday',
            3 => 'Wednesday',
            4 => 'Thusday',
            5 => 'Friday',
            6 => 'Saturday'
        );
        return data_return($data, $key);
    }

}




if (!function_exists('menu_type')) {

    function menu_type($key = NULL) {
        $data = array(
            '1' => 'Void',
            '2' => 'URL',
            '3' => 'Content'
        );
        return data_return($data, $key);
    }

}

if (!function_exists('menu_color')) {

    function menu_color($key = NULL) {
        $data = array(
            0 => 'yellow',
            1 => 'orange',
            2 => 'blue',
            3 => 'red',
            4 => 'green',
            5 => 'violet'
        );
        return data_return($data, $key);
    }

}

if (!function_exists('notice_type')) {

    function notice_type($key = NULL) {
        $data = array(
        );
        return data_return($data, $key);
    }

}


if (!function_exists('data_return')) {

    function data_return($data = array(), $key = NULL) {
        if ($key === NULL) {
            return $data;
        } else {
            if (array_key_exists($key, $data)) {
                return $data[$key];
            } else {
                return $key;
            }
        }
    }

}

if (!function_exists('check_request_url')) {

    function check_request_url($postUrl, $reqUrl) {

        $postUrl = str_replace("http:", "", $postUrl);
        $postUrl = str_replace("https:", "", $postUrl);

        $reqUrl = str_replace("http:", "", $reqUrl);
        $reqUrl = str_replace("https:", "", $reqUrl);

        if (strtolower($postUrl) != strtolower($reqUrl)) {
            redirect($postUrl);
            exit();
        }
    }

}


if (!function_exists('permission')) {

    function permission($key = NULL) {
        $data = array(
        );
        return data_return($data, $key);
    }

}


if (!function_exists('permission_id')) {

    function permission_id($permission_name) {
        $data = permission();
        foreach ($data as $key => $value) {
            if (strtolower(trim($value)) == strtolower(trim($permission_name))) {
                return $key;
            }
        }
        return NULL;
    }

}



if (!function_exists('random_password')) {

    function random_password() {
        $password = "";
        $char = array(
            'lower' => "abcdefghijklmnopqrstuwxyz",
            'upper' => "ABCDEFGHIJKLMNOPQRSTUWXYZ",
            'digit' => "0123456789",
            'special' => "!@*()"
        );

        foreach ($char as $row) {
            $len = strlen($row) - 1;
            for ($i = 0; $i < 2; $i++) {
                $n = rand(0, $len);
                $password .= $row[$n];
            }
        }
        return str_shuffle($password);
    }

}

if (!function_exists('secret_password')) {

    function secret_password($password) {
        return "M1" . $password . "z$";
    }

}

if (!function_exists('secret_code')) {

    function secret_code($password) {
        $lower = "abcdefghijklmnopqrstuwxyz";
        $upper = "ABCDEFGHIJKLMNOPQRSTUWXYZ";
        $digit = "0123456789";
        $special = "!@*()";
        return substr($upper, rand(0, strlen($upper) - 1), 1) . substr($digit, rand(0, strlen($digit) - 1), 1) . $password . substr($lower, rand(0, strlen($lower) - 1), 1) . substr($special, rand(0, strlen($special) - 1), 1);
    }

}

if (!function_exists('in_word_bangla')) {

    function in_word_bangla($number) {
        $ones = array('', 'এক', 'দুই', 'তিন', 'চার', 'পাঁচ', 'ছয়', 'সাত', 'আট', 'নয়', 'দশ', 'এগারো', 'বারো', 'তেরো', 'চৌদ্দ', 'পনেরো', 'ষোল', 'সতেরো', 'আঠারো', 'উনিশ', 'বিশ', 'একুশ', 'বাইশ', 'তেইশ', 'চব্বিশ', 'পঁচিশ', 'ছাব্বিশ', 'সাতাশ', 'আটাশ', 'ঊনত্রিশ', 'ত্রিশ', 'একত্রিশ', 'বত্রিশ', 'তেত্রিশ', 'চৌত্রিশ', 'পঁয়ত্রিশ', 'ছত্রিশ', 'সাঁইত্রিশ', 'আটত্রিশ', 'ঊনচল্লিশ', 'চল্লিশ', 'একচল্লিশ', 'বিয়াল্লিশ', 'তেতাল্লিশ', 'চুয়াল্লিশ', 'পঁয়তাল্লিশ', 'ছেচল্লিশ', 'সাতচল্লিশ', 'আটচল্লিশ', 'ঊনপঞ্চাশ', 'পঞ্চাশ', 'একান্ন', 'বায়ান্ন', 'তিপ্পান্ন', 'চুয়ান্ন', 'পঞ্চান্ন', 'ছাপ্পান্ন', 'সাতান্ন', 'আটান্ন', 'ঊনষাট', 'ষাট', 'একষট্টি', 'বাষট্টি', 'তেষট্টি', 'চৌষট্টি', 'পঁয়ষট্টি', 'ছেষট্টি', 'সাতষট্টি', 'আটষট্টি', 'ঊনসত্তর', 'সত্তর', 'একাত্তর', 'বাহাত্তর', 'তিয়াত্তর', 'চুয়াত্তর', 'পঁচাত্তর', 'ছিয়াত্তর', 'সাতাত্তর', 'আটাত্তর', 'ঊনআশি', 'আশি', 'একাশি', 'বিরাশি', 'তিরাশি', 'চুরাশি', 'পঁচাশি', 'ছিয়াশি', 'সাতাশি', 'আটাশি', 'উননব্বই', 'নব্বই', 'একানব্বই', 'বিরানব্বই', 'তিরানব্বই', 'চুরানব্বই', 'পঁচানব্বই', 'ছিয়ানব্বই', 'সাতানব্বই', 'আটানব্বই', 'নিরানব্বই');

        $word = '';
        //$number=intval($number);
        if ($number > 9999999) {
            $dr = floor($number / 10000000);
            $word .= in_word_bangla($dr) . 'কোটি ';
            $number = $number - $dr * 10000000;
        }
        if ($number > 99999) {
            $dr = floor($number / 100000);
            $word .= in_word_bangla($dr) . 'লক্ষ ';
            $number = $number - $dr * 100000;
        }
        if ($number > 999) {
            $dr = floor($number / 1000);
            $word .= in_word_bangla($dr) . 'হাজার ';
            $number = $number - $dr * 1000;
        }
        if ($number > 99) {
            $dr = floor($number / 100);
            $word .= in_word_bangla($dr) . 'শত ';
            $number = $number - $dr * 100;
        }
        if ($number > 0 && $number < 100) {
            $word .= $ones[$number] . ' ';
        }
        return $word;
    }

}



if (!function_exists('pagination')) {

    function pagination($current, $total_row, $per_page, $table_id, $dn) {
        $table_id = "'" . $table_id . "'";
        $show_page = 5;
        $total_page = ceil($total_row / $per_page);
        $pre = $current - 1;
        $next = $current + 1;
        $start = $current - floor(($show_page - 1) / 2);
        if ($start < 1) {
            $start = 1;
        }
        $end = $start + $show_page;
        if ($end > $total_page) {
            $end = $total_page + 1;
            $start = $end - $show_page;
        }
        if ($show_page > $total_page) {
            $start = 1;
            $end = $total_page + 1;
        }

        $output = '';
        $output .= '<div class="pagination"><ul>';
        if ($current == 1) {
            $output .= '<li class="disabled">&lt;&lt;</li>';
        } else {
            $output .= '<li onclick="find_data(' . $table_id . ', 1)" class="disabled pagi_active">&lt;&lt;</li>';
        }
        if ($current > 1) {
            $output .= '<li onclick="find_data(' . $table_id . ', ' . $pre . ')" class="disabled pagi_active">&lt;</li>';
        } else {
            $output .= '<li class="disabled">&lt;</li>';
        }

        for ($start; $start < $end; $start++) {
            if ($start >= 1 && $start <= $total_page) {
                if ($current == $start) {
                    $output .= '<li class="active">' . $start . '</li>';
                } else {
                    $output .= '<li onclick="find_data(' . $table_id . ', ' . $start . ')" class="disabled pagi_active">' . $start . '</li>';
                }
            }
        }
        if ($current < $total_page) {
            $output .= '<li onclick="find_data(' . $table_id . ', ' . $next . ')" class="disabled pagi_active">&gt;</li>';
        } else {
            $output .= '<li class="disabled">&gt;</li>';
        }
        if ($current == $total_page) {
            $output .= '<li class="disabled">&gt;&gt;</li>';
        } else {
            $output .= '<li onclick="find_data(' . $table_id . ', ' . $total_page . ')" class="disabled pagi_active">&gt;&gt;</li>';
        }
        $ds = (($current - 1) * $per_page) + 1;
        $de = $ds + $dn - 1;
        $output .= '</ul>';
        if ($total_row == 0) {
            $ds = 0;
        }
        if ($total_page == 0) {
            $current = 0;
        }
        $output .= '<div class="pagi_info">Display data ' . $ds . ' to ' . $de . ' of ' . $total_row . ' ( Page : ' . $current . ' of ' . $total_page . ')  </div>';
        $output .= '<div style="clear:both"></div></div>';
        return $output;
    }

}
?>