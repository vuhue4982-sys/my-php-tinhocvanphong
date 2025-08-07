</main>
<footer class="footer">
        <div class="container1">
            <div class="row1">
                <div class="footer-col">
                    <h4>Contact us</h4>
                    <ul>
                        <li><a href="">EMail:</a></li>
                        <li><a href="">Phone</a></li>
                        <li><a href="">Address</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>QUick Links</h4>
                    <ul>
                        <li><a href="index.php?controller=Word&action=list">Word</a></li>
                        <li><a href="index.php?controller=Excel&action=list">Excel</a></li>
                        <li><a href="index.php?controller=Powerpoint&action=list">Powerpoint</a></li>
                    </ul>
                </div>
                <div class="footer-col">
                    <h4>Follow us</h4>
                    <div class="social-links">
                        <a href=""><i class="fa-brands fa-facebook"></i></a>
                        <a href=""><i class="fa-brands fa-twitter"></i></a>
                        <a href=""><i class="fa-brands fa-instagram"></i></a>
                        <a href=""><i class="fa-brands fa-linkedin"></i></a>
                    </div>
                </div>
               
            </div>
        </div>
   </footer>
   <script >
        let navbar = document.querySelector(".navbar");
        let searchBox = document.querySelector(".search-box .bx-search");
        <i class='bx bx-x'></i>
        searchBox.addEventListener("click", ()=>{ 
            navbar.classList.toggle(showInput);
            if(navbar.classList.contains("showInput")){
                 searchBox.classList.replace("bx-search","bx-x");}
                 else{
                    searchBox.classList.replace("bx-search","bx-search");
                 }
        })
        let menuOpenBtn = document.querySelector(".navbar .bx-menu");
        let closeOpenBtn = document.querySelector(".nav-links .bx-xu");
        let navLinks = document.querySelector(".nav-links .bx-xu");
        menuOpenBtn.addEventListener("click",()=>{
        navLinks.style.left="0";
});
        closeOpenBtn.addEventListener("click",()=>{
        navLinks.style.left="-100%";
        });
        let videoArrow = document.querySelector(".video-arrow")
        videoArrow.addEventListener("click",()=>{
            navLinks.classList.toggle(show1);
        })
        let curriculumArrow = document.querySelector(".curriculum-arrow")
        videoArrow.addEventListener("click",()=>{
            navLinks.classList.toggle(show2);
        })
        let exerciseArrow = document.querySelector(".exercise-arrow")
        videoArrow.addEventListener("click",()=>{
            navLinks.classList.toggle(show3);
        })
    </script>
</body>
</html>