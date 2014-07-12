# PHPaginate
*A pagination engine filled with justice!*

## Overview

**PHPaginate** started as a quick and dirty solution to a spur-of-the-moment need for pagination in a web project I was working on. 

Load it into your own library or use it for a single program; **PHPaginate** takes care of the logic and leaves templating to the developer for maximum design and  flexibility. 

## Usage
I designed the project to be used with the [Smarty Template Engine](http://www.smarty.net/) so my main example file will require you to [download](http://www.smarty.net/download) a copy. 

You'll want to include phpaginate.php into your project and call 
    
    get_pagination_numbers($currentPage,$num_pages)
	
where **$currentPage** is the page number your user is on and **$num_pages** is the number of pages of results you have. 

I wanted **PHPaginate** to be as flexible as possible so it only outputs an array like this if **$currentPage** is 5:

	Array
	(
    	[0] => 2
    	[1] => 3
	    [2] => 4
    	[3] => 5
	    [4] => 6
	)
	
You'll then have to loop through that array to generate HTML whether it be in the PHP file or a separate template file. Open up **/examples/smarty/template/default/phpaginate.tpl** to find an example.

##Can I use this for my own project?
Of course! Attribution is always appreciated whether it simply be in the code comments or credits for the application itself. **I love to see what people do with my work** so if you happen to use **PHPaginate** in your project, let me know!
 
###Even if it's commercial?
Yes. Just don't sell **PHPaginate** itself as your own project. Make sure it's part of *your own* code.

##Known Issues
**There are two "mystical variables"** that cause errors to display because they're never defined. Remove these variables however and **PHPaginate** will cease to work. Because of this, it's advised to turn off error_reporting for your project.

**PHPaginate** currently prioritizes *previous* pages in its output. This means if you're on page 5 of 10, you'll see pages 2-6. Currently you can swap two loops around in the function to change priorities but I plan to resolve this in a future build.

That being said...

##Future Builds
I look to solve both of those "known issues" and turn this into an object-oriented program. Feel free to join me on that quest via pull requests!

##FAQ
*Nothing here yet. Ask away!*
