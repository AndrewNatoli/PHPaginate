<?php
/**
* get_pagination_numbers - Get an array of page numbers to show for a pagination system
* Loop through the array with smarty to display page links however you want.
* @param $currentPage - The current page we're on
* @param $num_pages   - The number of pages we have to display (calculate this on your own!)
* @return array
*/
function get_pagination_numbers($currentPage,$num_pages) {
    //If there's a single page, only return that one.
    if($num_pages == 1)
        return array("1");
    //Otherwise get ourselves a list!
    $_pagesToShow = 5;
    if($num_pages < $_pagesToShow)
        $pagesToShow = $num_pages;
    else
        $pagesToShow = $_pagesToShow;
    $beforeAndAfter = floor($pagesToShow/2);

    //Errors...
    if($currentPage <= 0)
        $currentPage = 1;

    $recursion = paginationBeforeAndAfter(0,0,$beforeAndAfter,$currentPage,$num_pages,$pagesToShow);
    $before = $recursion['before'];
    $after  = $recursion['after'];


    //Add the pages before...
    for($i=0; $i<$before; $i++) {
        $pages[] = ($currentPage-$before) + $i;
    }
    //Add the current pages and the pages after.
    if($after == 0)
        $after =1;
    for($i=0; $i<$after; $i++) {
        $pages[] = ($currentPage +$i);
    }
    return $pages;
}

/**
 * pagesBeforeAndAfter - Tells us how many pages we should display before and after the current page link
 * @param $before           - Default: 0, Number of page links to show before the current page
 * @param $after            - Default: 0, Number of page links to show after the current page
 * @param $initialBounds    - Number of pages to display to the left or right or current page link
 * @param $currentPage      - The current page number we're on
 * @param $num_pages        - The number of pages for our search result
 * @param $linksRemaining   - Initially the amount of pages we want to show entirely
 * @usage get_pagination_numbers()
 * @return array 
 */
function paginationBeforeAndAfter($before,$after,$initialBounds,$currentPage,$num_pages,$linksRemaining) {
    $failCount = 0; //When this hits 2 we'll break
    if($num_pages == 0)
        $num_pages =1;
    if($num_pages < $linksRemaining)
        $linksRemaining = $num_pages;


    for($i=0; $i<$initialBounds; $i++) {
        if(($currentPage-$before) > 1 && $linksRemaining >0) {
            $before++;
            $linksRemaining--;
        }
        else 
            $fail++;
    }
    for($i=0; $i<$initialBounds; $i++) {
        if(($currentPage+$after) <= $num_pages && $linksRemaining > 0) {
            $after++;
            $linksRemaining--;
            $error--;
        }
        else
            $error++;
    }
    if($linksRemaining == 0 || $error >= $linksRemaining) {
        $result['before'] = $before;
        $result['after'] = $after;
        return $result;
    }
    else
        return paginationBeforeAndAfter($before,$after,$initialBounds,$currentPage,$num_pages,$linksRemaining);
}