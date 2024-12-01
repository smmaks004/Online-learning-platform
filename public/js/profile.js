function change(blockName){
    // alert(blockName);
    var profileBlock = document.getElementById("info-block");
    var editBlock = document.getElementById("edit-block");
    var settingBlock = document.getElementById("setting-block");
    var controlBlock = document.getElementById('control-block');
    var lessonsBlock = document.getElementById('lessons-block');


    switch(blockName){
        case "home":
            window.location.href = "https://lerner.dev/home";

            return 0;
        case "profile":
            // console.log('profile');
            profileBlock.style.display ="block";

            editBlock.style.display = "none";
            settingBlock.style.display = "none";

            if(controlBlock){
                controlBlock.style.display = "none";
            }
            if(lessonsBlock){
                lessonsBlock.style.display = "none";
            }

            return 0;
        case "edit":
            // console.log('edit');
            editBlock.style.display = "block";
           
            profileBlock.style.display = "none";
            settingBlock.style.display = "none";
            
            if(controlBlock){
                controlBlock.style.display = "none";
            }
            if(lessonsBlock){
                lessonsBlock.style.display = "none";
            }

            return 0;
        case "setting":
            // console.log('setting');
            settingBlock.style.display = "block";

            profileBlock.style.display = "none";
            editBlock.style.display = "none";
            
            if(controlBlock){
                controlBlock.style.display = "none";
            }
            if(lessonsBlock){
                lessonsBlock.style.display = "none";
            }

            return 0;
        case "logout":
            document.getElementById('logout-form').submit();

            return 0;

        case "lessons":
            // console.log('lessons');
            lessonsBlock.style.display = "block";

            if(controlBlock){
                controlBlock.style.display = "none";
            }

            settingBlock.style.display = "none";
            profileBlock.style.display = "none";
            editBlock.style.display = "none";

            return 0;
        case "control":
            // console.log('control');
        
            controlBlock.style.display = "block";
            if(lessonsBlock){
                lessonsBlock.style.display = "none";
            }

            settingBlock.style.display = "none";
            profileBlock.style.display = "none";
            editBlock.style.display = "none";

            
            return 0;
        
    }
}



