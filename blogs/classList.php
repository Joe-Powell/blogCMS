<?php include './headerForBlogs.php'; ?>
<link rel="stylesheet" href="../css/classlist.css">




<div class="containBlog">

    <!-- -----IMAGE----- -->
    <h2></h2>
    <img src='../images/javascript_classList.png' width="300px" alt='#' /><br>
    <p></p>
    <!--end image---------------->



    <!-- -------------------------------------CODE--------------------------------------------------------------------- -->


    <pre class='thePre'><p>Create a class in style.css</p><code class="css"> 
    .Activate {
    transform: rotate(90deg);
    }
    </code></pre>

    <pre class='thePre'><p>Some basic HTML</p><code class="html"> 
  
    &lt;div class='theDiv'> Text that will rotate &lt;/div>
  
    </code></pre>

    <pre class='thePre'><p>In the .js file make an onclick handler</p><code class="javascript"> 

    const theDiv = document.querySelector('.theDiv');
    theDiv.addEventListener('click', () => {
        theDiv.classList.toggle('Activate');
})
   
    </code></pre>

    <!-- -------------------------------------------------------------------------------------------------------------- -->







</div>









<?php include 'footerForBlogs.php'; ?>