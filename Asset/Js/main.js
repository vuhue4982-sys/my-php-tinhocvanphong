/* SIDEBAR*/

const listitem =document.querySelectorAll(".sidebar-menu li");
listitem.forEach(item =>{
    item.addEventListener("click",()=>{
        let isActive = item.classList.contains("active");
        listitem.forEach(el=>{
            el.classList.remove("active");
        })
        if(isActive) item.classList.remove("active");
        else item.classList.add("active");
    })
})/*
const toggleSidebar =document.querySelector(".btn-toggle");
const logo =document.querySelector(".logo-box");
const sidebar = document.querySelector(".sidebar");
toggleSidebar.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})


logo.addEventListener("click", () => {
    sidebar.classList.toggle("close");
})
*/
/*PROFILE DROPDOWM*/

const profile  = document.querySelector('.nav-right .profile');
const imgProfile = profile.querySelector('img');
const dropdownProfile = profile.querySelector('.profile-link');
imgProfile.addEventListener('click',() => {
   dropdownProfile.classList.toggle('show');
})

window.addEventListener('click', function (e) {
    if(e.target !== imgProfile){
        if (e.target !== dropdownProfile) {
            if (dropdownProfile.classList.contains('show')) {
                dropdownProfile.classList.remove('show');
            }
        }
    }
})
function previewFile() {
    const preview = document.querySelector('#img_preview');
    const file = document.querySelector('#input_image').files[0];
    const imgvalue = document.querySelector('#value_image');
    const reader = new FileReader();
    reader.addEventListener('load', function() {
        preview.src = reader.result;
        imgvalue.value = reader.result;
    },false);
    if (imgvalue) {
        reader.readAsText(imgvalue);
    }
    if (file) {
        reader.readAsDataURL(file);
    }
}
















