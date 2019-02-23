
function onClickAsAdmin(){
    //console.log('onClickAsAdmin');
    if ( localStorage.getItem('user') === null || 
        localStorage.getItem('user') === 'Student') {
        var m = 'Signin with your<br>Admin username and password';
        var n = 'Signin as Student';
        asAdmin('asAdmin','Username','Password','admin','password',m,n,'asAdmin');
        localStorage.setItem('user','Student');
    }else if( localStorage.getItem('user') === 'asAdmin'){
        var m = 'Enter your email address and <br>Student ID to SIGN-IN';
        var n = 'Signin as Admin';
        asAdmin('Signin','Email address','Id number','','text',m,n,'Student');
        localStorage.setItem('user','asAdmin');
    }
}
function asAdmin(a,b,c,d,e,m,n,o) {
    //console.log('asAdmin');
    //console.log(o);
    var input = document.querySelector('#signin input');
    input.name = a;
    document.getElementById("l_email").innerText = b ;
    document.getElementById("l_id").innerHTML = c;
    document.getElementById("in_email").value = d;
    var in_id = document.getElementById("in_id");
    in_id.type = e;
    in_id.value = d;

    sign_title.innerHTML = m;
    document.querySelector('#signin_admin a').innerText = n;
    localStorage.setItem('user',o);
}
function changeLocalAgain() {
    //console.log('on change local again');
    if ( localStorage.getItem('user') === 'Student') {
        localStorage.setItem('user','asAdmin');
        onClickAsAdmin();
    }else if( localStorage.getItem('user') === 'asAdmin'){
        localStorage.setItem('user','Student');
        onClickAsAdmin();
    }
}
function onMouseOver(x) {
    var wel_reg = document.getElementsByClassName("wb");
    for( var i = 0 ; i < 3 ; i++ ){
        wel_reg[i].style.cssText = "opacity: 0.5;"+
        "z-index: 0;"+
        "filter: blur(5px);"+
        "transition: all 0.3s ease-in-out;";
    }
    var par = x.parentNode;
    par.style.cssText = 'opacity: 1;'+
    'z-index: 10;'+
    'filter: blur(0);'+
    'transition: all 0.3s ease-in-out;';
}
function onMouseOut(x){
    var wel_reg = document.getElementsByClassName("wb");
    for( var i = 0 ; i < 3 ; i++ ){
        wel_reg[i].style.cssText = "opacity: 1;"+
        "z-index: 10;"+
        "filter: blur(0);"+
        "transition: all 0.3s ease-in-out;";
    }
}
function changeLocal(x){
    //console.log(x);
    localStorage.setItem('user',x);
}


function logout() {
    window.location.replace("PHPScripts/signout.sc.php");
}

function cancelRegDialog(x) {

    var div_center = document.querySelector('.stu_center');
    var popUP = document.querySelector('.popup');
    var cancelreg = document.querySelector('.cancelreg');
    var updateSlot = document.querySelector('.updateSlot');

    if( x === 'c_reg' ){
        div_center.style.cssText = 'filter:blur(5px);z-index:0';
        popUP.style.cssText = 'z-index:20;opacity:1;height:22vh;';

        cancelreg.style.cssText = 'display:block;visiblity:visible;';
        updateSlot.style.cssText = 'display:none;visiblity:hidden;';
    }
    else if( x === 'change_reg' ){
        div_center.style.cssText = 'filter:blur(5px);z-index:0';
        popUP.style.cssText = 'z-index:20;opacity:1;height:30vh;';

        cancelreg.style.cssText = 'display:none;visiblity:hidden;';
        updateSlot.style.cssText = 'display:block;visiblity:visible;';
    }
    else if( x === 'update' ){
        window.location.replace('register.php?mess=update');
    }
}

function onClickNO() {
    var div_center = document.querySelector('.stu_center');
    var popUP = document.querySelector('.popup');
    div_center.style.cssText = 'filter:blur(0);z-index:20';
    popUP.style.cssText = 'z-index:0;opacity:0;';
}