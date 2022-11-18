<?php 
            // conditional for prev/next value to avoid negative
            $current_slide = isset($get_slide) ? $get_slide : 1;
            $current_slide = round($current_slide);
            
            $prev_value = $current_slide > 1 ? 1 : 0;
            $next_value = $current_slide < $total_pages-1 ? 1 : 0;
            // lowest page number 
            $i = isset($get_slide) ? ($get_slide-2 < 1 ? 1 : $get_slide-2) : 1;
            // highest page number 
            $j = isset($get_slide) ? ($get_slide+2 > 5 ? 5 : $get_slide + 2) : 5;
            
            $j = $i < 2 ? 5 : ($current_slide+2 > $total_pages ? $total_pages : $current_slide+2);
            $i = $current_slide+2 > $total_pages ? ($current_slide > 3 ? $i-1: $i) : $i;
            $i = $current_slide >= $total_pages-1 ? $i-1 : $i;
        ?>