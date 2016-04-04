<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/4/4
 * Time: 13:49
 */
function p($var)
{
    if (is_bool($var)) {
        var_dump($var);
    } else if (is_null($var)) {
        var_dump(NULL);
    } else {
        echo "<pre style='position:relative;z-index:1000;padding:10px;border-radius:5px;background:#F5F5F5;border:1px solid #aaa;font-size:14px;line-height:18px;opacity:0.9;'>" . print_r($var, true) . "</pre>";
    }
}


$arr=array(1,43,54,62,21,66,32,78,36,76,39);

//ð��
function getpao($arr)
{
    $len=count($arr);
    //����һ�������� ��������ð��������
    //�ò�ѭ������ ��Ҫð�ݵ�����
    for($i=1;$i<$len;$i++)
    { //�ò�ѭ����������ÿ�� ð��һ���� ��Ҫ�ȽϵĴ���
        for($k=0;$k<$len-$i;$k++)
        {
            if($arr[$k]>$arr[$k+1])
            {
                $tmp=$arr[$k+1];
                $arr[$k+1]=$arr[$k];
                $arr[$k]=$tmp;
            }
        }
    }
    return $arr;
}

p(getpao($arr));

//ѡ������
function select_sort($arr) {
//ʵ��˼· ˫��ѭ����ɣ���������������ǰ����Сֵ���ڲ� ���ƵıȽϴ���
    //$i ��ǰ��Сֵ��λ�ã� ��Ҫ����Ƚϵ�Ԫ��
    for($i=0, $len=count($arr); $i<$len-1; $i++) {
        //�ȼ�����С��ֵ��λ��
        $p = $i;
        //$j ��ǰ����Ҫ����ЩԪ�رȽϣ�$i ��ߵġ�
        for($j=$i+1; $j<$len; $j++) {
            //$arr[$p] �� ��ǰ��֪����Сֵ
            if($arr[$p] > $arr[$j]) {
                //�Ƚϣ����ָ�С��,��¼����Сֵ��λ�ã��������´αȽ�ʱ��
                // Ӧ�ò�����֪����Сֵ���бȽϡ�
                $p = $j;
            }
        }
        //�Ѿ�ȷ���˵�ǰ����Сֵ��λ�ã����浽$p�С�
        //������� ��Сֵ��λ���뵱ǰ�����λ��$i��ͬ����λ�û�������
        if($p != $i) {
            $tmp = $arr[$p];
            $arr[$p] = $arr[$i];
            $arr[$i] = $tmp;
        }
    }
    //�������ս��
    return $arr;
}


//��������
function insert_sort($arr) {
    //���� �Ĳ������Ѿ�����õ�
    //�Ĳ�����û�������
    //�ҵ�����һ����Ҫ�����Ԫ��
    //���Ԫ�� ���Ǵӵڶ���Ԫ�ؿ�ʼ�������һ��Ԫ�ض��������Ҫ�����Ԫ��
    //����ѭ���Ϳ��Ա�־����
    //iѭ������ ÿ����Ҫ�����Ԫ�أ�һ����Ҫ�����Ԫ�ؿ��ƺ��ˣ�
    //����Ѿ�������ֳ���2���֣��±�С�ڵ�ǰ�ģ���ߵģ���������õ�����
    for($i=1, $len=count($arr); $i<$len; $i++) {
        //��õ�ǰ��Ҫ�Ƚϵ�Ԫ��ֵ��
        $tmp = $arr[$i];
        //�ڲ�ѭ������ �Ƚ� �� ����
        for($j=$i-1;$j>=0;$j--) {
            //$arr[$i];//��Ҫ�����Ԫ��; $arr[$j];//��Ҫ�Ƚϵ�Ԫ��
            if($tmp < $arr[$j]) {
                //���ֲ����Ԫ��ҪС������λ��
                //����ߵ�Ԫ����ǰ���Ԫ�ػ���
                $arr[$j+1] = $arr[$j];
                //��ǰ���������Ϊ ��ǰ��Ҫ��������
                $arr[$j] = $tmp;
            } else {
                //�����������Ҫ�ƶ���Ԫ��
                //�������Ѿ�����������飬��ǰ��ľͲ���Ҫ�ٴαȽ��ˡ�
                break;
            }
        }
    }
    //�����Ԫ�� ���뵽�Ѿ�����õ������ڡ�
    //����
    return $arr;
}



//��������
function quick_sort($arr) {
    //���ж��Ƿ���Ҫ��������
    $length = count($arr);
    if($length <= 1) {
        return $arr;
    }
    //���û�з��أ�˵�������ڵ�Ԫ�ظ��� ����1������Ҫ����
    //ѡ��һ�����
    //ѡ���һ��Ԫ��
    $base_num = $arr[0];
    //���� ���˱���������Ԫ�أ����մ�С��ϵ��������������
    //��ʼ����������
    $left_array = array();//С�ڱ�ߵ�
    $right_array = array();//���ڱ�ߵ�
    for($i=1; $i<$length; $i++) {
        if($base_num > $arr[$i]) {
            //�����������
            $left_array[] = $arr[$i];
        } else {
            //�����ұ�
            $right_array[] = $arr[$i];
        }
    }
    //�ٷֱ�� ��� �� �ұߵ����������ͬ��������ʽ
    //�ݹ�����������,����¼���
    $left_array = quick_sort($left_array);
    $right_array = quick_sort($right_array);
    //�ϲ���� ��� �ұ�
    return array_merge($left_array, array($base_num), $right_array);
}

p(quick_sort($arr));

//���ֲ���

function binarySearch(Array $arr, $target) {
    $low = 0;
    $high = count($arr) - 1;

    while($low <= $high) {
        $mid = floor(($low + $high) / 2);
        //�ҵ�Ԫ��
        if($arr[$mid] == $target) return $mid;
        //��Ԫ�ر�Ŀ���,������
        if($arr[$mid] > $target) $high = $mid - 1;
        //��Ԫ�ر�Ŀ��С,�����Ҳ�
        if($arr[$mid] < $target) $low = $mid + 1;
    }


    return false;
}

$arr = array(1, 3, 5, 7, 9, 11);
$inx = binarySearch($arr, 5);
var_dump($inx);


