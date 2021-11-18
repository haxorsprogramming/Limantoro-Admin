
// vue object 
var dDetailProject = new Vue({
    el : '#dDetailProject',
    data : {
        textSection2 : "Data Unit",
        kdProject : '',
        stateEdit : false
    },
    methods : {
        dataUnitAtc : function()
        {
            wrapSection("Data unit", "#btnDataUnit", "dataunit");
        },
        matDariStockAtc : function()
        {
            wrapSection("Material dari stock", "#btnMaterialDariStock", "materialdaristock");
        },
        matTersisaAtc : function()
        {
            wrapSection("Material Tersisa", "#btnMaterialTersisa", "materialtersisa");
        }
    }
});

// fungsi 
dDetailProject.kdProject = document.querySelector("#txtHidKdProject").value;
wrapSection("Data unit", "#btnDataUnit", "dataunit");

function wrapSection(title, elBtn, routeSec)
{
    let kdProject = dDetailProject.kdProject;
    dDetailProject.textSection2 = title;
    loadingSection();
    togButton(elBtn);
    loadToItemSection(kdProject, routeSec);
}

function togButton(idBtn)
{
    $(".btn-large").removeClass("orange");
    document.querySelector(idBtn).classList.add("orange");    
}
function loadingSection()
{
    document.querySelector("#dItemDetails").innerHTML = "<p class='center-align'>Memuat ...</p>";
}
function loadToItemSection(kdProject, sec)
{
    let rLoadSecDataUnit = server + "app/project/"+kdProject+"/detail/sec/"+sec;
    $("#dItemDetails").load(rLoadSecDataUnit);
}
