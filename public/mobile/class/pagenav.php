<?php

class PageNav {

    var $total;
    var $perpage;
    var $current;
    var $url;

    function PageNav($total_items, $items_perpage, $current_start, $start_name = "start", $extra_arg = "") {

        $this->total = intval($total_items);
        $this->perpage = intval($items_perpage);
        $this->current = intval($current_start);
        if ($extra_arg != '' && ( substr($extra_arg, -5) != '&amp;' || substr($extra_arg, -1) != '&' )) {
            $extra_arg .= '&amp;';
        }
        $this->url = PHP_SELF . '?' . $extra_arg . trim($start_name) . '=';
    }

// New Function

    function renderCom($offset = 4, $renderstyle = 1) {


        if ($this->total < $this->perpage) {
            return;
        }

        $total_pages = ceil($this->total / $this->perpage);

        if ($total_pages > 1) {
            $ret  = "<div class='pager'>";
            $prev = ($this->current - $this->perpage);

            if ($renderstyle == 1) {
                if ($prev >= 0) {
                    $ret .= '<a href="'.$this->url.$prev.'">...</a>';
                }
            } else {
                //$ret .= '<table width="100%" class="prenext" border="0" cellpadding="7" cellspacing="0"><tr>';
                if ($prev >= 0) {
                    $ret .= '<a href="'.$this->url.$prev.'">...</a>';
                } else {
                    //	$ret .= '<li><a href="javascript:">&laquo; </a></li>';
                }
                //$ret .= '<td align="center">';
            }

            $counter      = 1;
            $current_page = intval(floor(($this->current + $this->perpage) / $this->perpage));
            while ($counter <= $total_pages) {
                if ($counter == $current_page) {
                    $ret .= '<span class="active">'.$counter.'  </span>  ';
                } elseif ( ($counter > $current_page-$offset && $counter < $current_page + $offset ) || $counter == 1 || $counter == $total_pages ) {
                    if ( $counter == $total_pages && $current_page < $total_pages - $offset ) {
                        $ret .= "<span class='empty'>...</span> ";
                    }
                    $ret .= '<a title="'.($counter - 1) * $this->perpage.'" href="'.$this->url.(($counter - 1) * $this->perpage).'">'.$counter.'</a>';
                    if ( ($counter == 1) && ($current_page > (1 + $offset) ) ) {
                        $ret .= "<span class='empty'>...</span> ";
                    }
                }
                $counter++;
            }
            $next = ($this->current + $this->perpage);

            if ($renderstyle == 1) {
                if ($this->total > $next) {
                    $ret .= '<a href="'.$this->url.$next.'">...</a>';
                }
            } else {
                if ($this->total > $next) {
                    $ret .= '<a href="'.$this->url.$next.'"><b>...</b></a>';
                } else {
                    //	$ret .= '<li><i>Sonraki</i> &raquo;</li>';
                }
                $ret .= '</div>';
            }
        }

        return $ret;
    }

//---------------------------------------------------------------------------------------//
}

class PageNav2 {

    var $total;
    var $perpage;
    var $current;
    var $url;

    function PageNav2($total_items, $items_perpage, $current_start) {

        $this->total = intval($total_items);
        $this->perpage = intval($items_perpage);
        $this->current = intval($current_start);
        if ($extra_arg != '' && ( substr($extra_arg, -5) != '&amp;' || substr($extra_arg, -1) != '&' )) {
            $extra_arg .= '&amp;';
        }
        $this->url = "javascript: submitformbypage('";
    }

// New Function

    function renderCom2($offset = 4, $renderstyle = 1) {

		$singlequote = "'";
        if ($this->total < $this->perpage) {
            return;
        }

        $total_pages = ceil($this->total / $this->perpage);

        if ($total_pages > 1) {
            $ret  = "<div class='pager'>";
            $prev = ($this->current - $this->perpage);

            if ($renderstyle == 1) {
                if ($prev >= 0) {
                    $ret .= '<a href="'.$this->url.$prev.'">...</a>';
                }
            } else {
                //$ret .= '<table width="100%" class="prenext" border="0" cellpadding="7" cellspacing="0"><tr>';
                if ($prev >= 0) {
                    $ret .= '<a href="'.$this->url.$prev.'">...</a>';
                } else {
                    //	$ret .= '<li><a href="javascript:">&laquo; </a></li>';
                }
                //$ret .= '<td align="center">';
            }

            $counter      = 1;
            $current_page = intval(floor(($this->current + $this->perpage) / $this->perpage));
            while ($counter <= $total_pages) {
                if ($counter == $current_page) {
                    $ret .= '<span class="active">'.$counter.'  </span>  ';
                } elseif ( ($counter > $current_page-$offset && $counter < $current_page + $offset ) || $counter == 1 || $counter == $total_pages ) {
                    if ( $counter == $total_pages && $current_page < $total_pages - $offset ) {
                        $ret .= "<span class='empty'>...</span> ";
                    }
                    $ret .= '<a title="'.($counter - 1) * $this->perpage.'" href="'.$this->url.(($counter - 1) * $this->perpage).$singlequote.')">'.$counter.'</a>';
                    if ( ($counter == 1) && ($current_page > (1 + $offset) ) ) {
                        $ret .= "<span class='empty'>...</span> ";
                    }
                }
                $counter++;
            }
            $next = ($this->current + $this->perpage);

            if ($renderstyle == 1) {
                if ($this->total > $next) {
                    $ret .= '<a href="'.$this->url.$next.$singlequote.')">...</a>';
                }
            } else {
                if ($this->total > $next) {
                    $ret .= '<a href="'.$this->url.$next.$singlequote.')"><b>...</b></a>';
                } else {
                    //	$ret .= '<li><i>Sonraki</i> &raquo;</li>';
                }
                $ret .= '</div>';
            }
        }

        return $ret;
    }

//---------------------------------------------------------------------------------------//
}

// END PAGENAV
?>