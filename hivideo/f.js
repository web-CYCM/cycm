function checkPwd(){
    if('38f531f49368ed0bfd43eea88063034b' == md5(document.querySelector('#form input').value)){
        document.querySelector('#form').style.display = 'none';
        document.querySelector('.main-wrap').style.display = 'block';
    }
}