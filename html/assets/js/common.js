/// 운영체제 정보 알아내기
let os = navigator.userAgent.toLocaleLowerCase();

if(os.indexOf("macintosh") > -1){
    document.querySelector("body").classList.add("macintosh");
} else if(os.includes("windows") > -1) {
    document.querySelector("body").classList.add("windows");
} else if(os.includes("iphone") > -1) {
    document.querySelector("body").classList.add("iphone");
} else if(os.includes("android") > -1) {
    document.querySelector("body").classList.add("android");
}


//Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36