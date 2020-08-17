<?php
//栈 (特殊的链表)
/**
 * 后进先出 也就是说 都是在线性表的末端进行处理( 类似 砖头盖房子)
 * 1.顺序栈
 * 空栈表示无元素  栈顶表示 表尾  栈底表示 表头 ，push 表示入栈压栈 删除操作表示pop 出栈
 * 想想 php 的 array_push array_pop 不就是操作最后一个元素吗
 * 假设栈中只有一个数据元素，则 top = 0。一般以 top 是否为 -1 来判定是否为空栈。
 * 2.链栈 ： 由链表组成的栈 一个个链表 后进先出的 组成栈
 *
 *
 */
$str = [ '(',')','{','}','[',']' ];
var_dump(complianceStr($str));
/**
 * 题目:给定一个只包括 '('，')'，'{'，'}'，'['，']' 的字符串，判断字符串是否有效。有效字符串需满足：左括号必须与相同类型的右括号匹配，左括号必须以正确的顺序匹配。例如，{ [ ( ) ( ) ] } 是合法的，而 { ( [ ) ] } 是非法的
 * 思路 ：
 * 当出现左括号时，压栈。
 * 当出现右括号时，出栈。并且判断当前右括号，和被出栈的左括号是否是互相匹配的一对。.
 * 如果不是，则字符串非法。当遍历完成之后，如果栈为空。则合法
 */
function complianceStr($str){
    $zhan = [];
    $bug = false;
    foreach ($str as $v){
        if (isLeft($v)){
            //压栈
            $zhan[] = $v;
        }else{
            //右侧括号出栈 并且匹配
//            array_push($zhan,$v);//栈顶的元素 进行匹配
            $left = $zhan[count($zhan)-1];//栈中最后一个元素
            if (isPair([$left,$v])){
                //匹配成功 后 从 栈中删除
                array_pop($zhan);
            }else{
                $bug = true;
                break;
            }
        }
    }
    return (count($zhan) >0 || $bug? '不匹配': '匹配').implode($zhan);
}

//判断是否是一对
function isPair($pair){
    if ($pair == ['(',')'] || $pair == ['{','}'] || $pair == ['[',']'] ){
        return true;
    }
    return false;
}

//是否为左边
function isLeft($char) {
    if ($char == '{' || $char == '(' || $char == '[') {
        return true;
    } else {
        return false;
    }
}

//例二