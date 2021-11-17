
// vue object 
var dDetailProject = new Vue({
    el : '#dDetailProject',
    data : {
        textSection2 : "Data Unit",
        kdProject : ''
    },
    methods : {
        dataUnitAtc : function()
        {
            let kdProject = dDetailProject.kdProject;
            dDetailProject.textSection2 = "Data Unit";
            loadingSection();
            togButton("#btnDataUnit");
            loadToItemSection(kdProject, "dataunit");
        },
        matDariStockAtc : function()
        {
            let kdProject = dDetailProject.kdProject;
            dDetailProject.textSection2 = "Material dari stock";
            loadingSection();
            togButton("#btnMaterialDariStock");
            loadToItemSection(kdProject, "materialdaristock");
        },
        matTersisaAtc : function()
        {
            let kdProject = dDetailProject.kdProject;
            dDetailProject.textSection2 = "Material Tersisa";
            loadingSection();
            togButton("#btnMaterialTersisa");
            loadToItemSection(kdProject, "materialtersisa");
        }
    }
});

// fungsi 
dDetailProject.kdProject = document.querySelector("#txtHidKdProject").value;
loadSecAwal();

function loadSecAwal()
{
    let kdProject = dDetailProject.kdProject;
    dDetailProject.textSection2 = "Data Unit";
    loadingSection();
    togButton("#btnDataUnit");
    tidur_bentar(1000);
    loadToItemSection(kdProject, "dataunit");
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
