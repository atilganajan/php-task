<?php

$query = "SELECT 
    u_list.id AS urun_id,
    k_list.grup_adi,
    u_list.urun_adi,
    u_list.urun_birimi AS birimi,
    g_list.giren_stok - c_list.cikan_stok AS guncel_stok
FROM 
    u_list
JOIN 
    k_list ON u_list.grup_id = k_list.id
LEFT JOIN 
    g_list ON u_list.id = g_list.urun_id
LEFT JOIN 
    c_list ON u_list.id = c_list.urun_id
;";