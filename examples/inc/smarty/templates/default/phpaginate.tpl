{* PHPaginate Example *}
<div>
  <span style="font-weight:bold;">
        Page {$currentPage} of {$totalPages}
  </span>
  <ul style="padding-left:0px;">
      {foreach $pageNumbers as $pageNumber}
          <li style="display:inline-block">
              {* Make this page number a link if it's not the current page. *}
              {if $pageNumber != $currentPage}
                <a href="?p={$pageNumber}">{$pageNumber}</a>
              {else}
                  {$currentPage}
              {/if}
          </li>
      {/foreach}
  </ul>
</div>