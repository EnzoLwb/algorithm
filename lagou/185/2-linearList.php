<?php
// 线性表 (链表)
/**
 * 1.插入 假如 在p元素后面插入一个s元素
 *  s.next = p.next.next
 *  p.next = s
 * 2.删除 假如删除 p元素后面的b元素
 * p.next = p.next.next
 * 3.修改 相当于先删除后新增 假如修改 p元素后面的 b元素 为q元素
 * q.next = b.next
 *  p.next = q
 */
//反转线性表 过程: 1->2->3->4  2->1->3->4  3->2->1->4  4->3->2->1
/*
 * while (curr){
        next = curr.next;
        curr.next = prev；
        prev = curr;
        curr = next;
   }
*/
//奇数 线性表中查找 中间的一个元素 ； 判断链表是否有环(如果链表存在环，快指针和慢指针一定会在环内相遇，即 fast == slow 的情况一定会发生;反之，则最终会完成循环，二者从未相遇。)
//都会用到 快慢指针  我可以简称为 滑板鞋算法 一步两步 一步两步
/**
 * while(fast && fast.next && fast.next.next){//fast 到末尾 slow也就到中间了
        fast = fast.next.next;
        slow = slow.next;
}
 */
