/* Author: Gordon Carroll
*/
function getBody(){
    var progress = parseInt(window.sessionStorage.getItem('progress'));
    $("#innerContent").hide();
    $("#innerContent").slideUp();
    if(progress==3){
        $("#next").html('SUBMIT VOTES');
    }else{
        $("#next").html('Next');
    }
    switch(progress){
        case 0: // instructions
        var getURL = 'instructions.php';
        break;
        case 1: //presidential
        var getURL = 'presidential.php';
        break;
        case 2:
        var getURL = 'senatorial.php';
        break;
        case 3:
        var pres = parseInt(window.sessionStorage.getItem('presidentialChoice'));
        var sen = parseInt(window.sessionStorage.getItem('senatorialChoice'));
        var getURL = 'confirm.php?pres=' + pres + '&sen=' + sen;
        break;
        case 4:
        var pres = parseInt(window.sessionStorage.getItem('presidentialChoice'));
        var sen = parseInt(window.sessionStorage.getItem('senatorialChoice'));
        var getURL = 'saveVotes.php?pres=' + pres + '&sen=' + sen;
        $("#next").hide();
        $("#previous").hide();
        break;
        default:
        break;
    }
     $.get(getURL, function(data){
            $("#innerContent").html(data).slideDown('fast');
        });
    setProgressBar();
    setTimeout("populateRadioButtons();",500);
}
function populateRadioButtons(){
    var pres = parseInt(window.sessionStorage.getItem('presidentialChoice'));
    var sen = parseInt(window.sessionStorage.getItem('senatorialChoice'));
    var $radios = $('input:radio[name=presidentialElection]');
        if($radios.is(':checked') === false) {
            $radios.filter('[value=' + pres +']').attr('checked', true);
        }
        
    var $radios2 = $('input:radio[name=senatorialElection]');
        if($radios2.is(':checked') === false) {
            $radios2.filter('[value=' + sen +']').attr('checked', true);
        }
}
function setProgressBar(){
    $("#progBar").attr('value', getProgress());
}
function getProgress(){
    return parseInt(window.sessionStorage.getItem('progress'))*30;
}
function prev(){
    var currentProg = parseInt(window.sessionStorage.getItem('progress'));
    if(currentProg > 0){
        if(currentProg == 1){
            var pres = $("input:radio[name=presidentialElection]:checked").val();
            if(pres != "undefined"){
                window.sessionStorage.setItem('presidentialChoice', pres);
            }
        }
        if(currentProg == 2){
            var sen = $("input:radio[name=senatorialElection]:checked").val();
            if(sen != "undefined"){
                window.sessionStorage.setItem('senatorialChoice', sen);
            }
        }
        currentProg--;
        window.sessionStorage.setItem('progress', currentProg);
        getBody();
    }

}
function next(){
    var currentProg = parseInt(window.sessionStorage.getItem('progress'));
    if(currentProg < 4){
        if(currentProg == 1){
            var pres = $("input:radio[name=presidentialElection]:checked").val();
            if(pres != "undefined"){
                window.sessionStorage.setItem('presidentialChoice', pres);
            }
        }
        if(currentProg == 2){
            var sen = $("input:radio[name=senatorialElection]:checked").val();
            if(sen != "undefined"){
                window.sessionStorage.setItem('senatorialChoice', sen);
            }
        }
    currentProg++;
    window.sessionStorage.setItem('progress', currentProg);
    getBody();
    }
}














