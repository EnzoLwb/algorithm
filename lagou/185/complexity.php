<?php
#倒置数组 输入 12345 返回 54321
#Before
function reserveArr($arr){
    $b = [];
    for ($i = 0 ; $i < count($arr) ; $i++){
        $b[count($arr) - $i -1 ] = $arr[$i];
    }
    return $b;
}

print_r( findMaxCount([1,2,3,4,5,4,3,3,3]) );


#after 二分法
function reserveArr2($arr)
{
    echo floor( count($arr)/2);
    for ($i = 0 ; $i < floor( count($arr)/2 ); $i++ ){
        //交换位置即可
        $tem = $arr[$i];
        $arr[$i] = $arr[count($arr) - $i -1];
        $arr[count($arr) - $i -1] = $tem;
    }
    return $arr;
}

# 结论 ： 时间复杂度 都为 O(n) 因为for循环了 n次 和 n/2 次 同为O(n). 但空间复杂度不同 因为前者 $b 与 arr 数量相同，而后者 $tem 与输入数组长度无关，即 O(1)。

# 寻找数组中的最大值  O(n)
function findMax($arr){
    $max = $arr[0];
    for ($i = 0 ; $i < count($arr) ; $i++) {
        if ($arr[$i] > $max){
            $max = $arr[$i];
        }
    }
    return $max;
}

#寻找 数组中出现次数最多的一个元素
#before
function findMaxCount($arr){
    $new_record = [];
    for ($i = 0 ; $i < count($arr) ; $i++) {
        if (isset($new_record[$arr[$i]])) {
            //如果已经存在则 +1
            $new_record[$arr[$i]]++;
        }else{
            $new_record[$arr[$i]] = 1;
        }
    }
    $max = $new_record[0];//假设他是最大值
    $key = 0;
    foreach ($new_record as $k=>$v){
        if ($v > $max){
            $key = $k;
            $max = $v;
        }
    }

    return $key;
}
#after


/**
 * 结论：

    一个顺序结构的代码，时间复杂度是 O(1)。

    二分查找，或者更通用地说是采用分而治之的二分策略，时间复杂度都是 O(logn)。这个我们会在后续课程讲到。

    一个简单的 for 循环，时间复杂度是 O(n)。

    两个顺序执行的 for 循环，时间复杂度是 O(n)+O(n)=O(2n)，其实也是 O(n)。

    两个嵌套的 for 循环，时间复杂度是 O(n²)。
 *
 */