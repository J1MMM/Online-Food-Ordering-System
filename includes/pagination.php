<?php 
            // conditional for prev/next value to avoid negative
            $current_slide = isset($get_slide) ? $get_slide : 1;
        
            $prev_value = $current_slide > 1 ? 1 : 0;
            $next_value = $current_slide <= $total_pages-1 ? 1 : 0;

            // lowest page number 
            $i = isset($get_slide) ? ($get_slide-4 < 1 ? 1 : $get_slide-4) : 1;
            // highest page number 
            $j = isset($get_slide) ? ($get_slide < 5 ? 5 : ($get_slide + 2 > $total_pages ? $current_slide : $get_slide + 2)) : 5;
            
            $i = $j > 5 ? $i+2 : $i;
            $i = $current_slide + 2 > $total_pages ? $i-2 : $i;
        ?>