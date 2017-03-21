<?php
/**************************************************
*  Created:  2010-10-28
*
*  防止XSS攻击,htmlspecialchars的别名
*
*  @Xsmart (C)2006-2099Inc.
*  @Author guoliang1 <guoliang1@staff.sina.com.cn>
*
***************************************************/

function escape($str,  $quote_style = ENT_COMPAT ){
    return htmlspecialchars($str, $quote_style);
}