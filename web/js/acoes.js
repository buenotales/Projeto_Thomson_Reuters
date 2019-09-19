
$("#atribuidos").ready(function(){

    let id_user = $("#id-user").html();
    
    getEquipamentosAtribuidos(id_user);
});
$("#btnAtribuidos").click(function(){
        
    $("#infoAtivo").fadeOut(10);
    $("#historico").fadeOut(10);
    $("#infoUser").fadeOut(10);
    $("#usuarios").fadeOut(10);

    $("#atribuidos > tbody").empty();

    let id_user = $("#id-user").html();
    
    getEquipamentosAtribuidos(id_user);

    $("#atribuidos").fadeIn(800);
});
$("#btnUsuarios").click(function(){
        
    $("#infoAtivo").fadeOut(10);
    $("#historico").fadeOut(10);
    $("#atribuidos").fadeOut(10);
    $("#infoUser").fadeOut(10);

    $("#usuarios > tbody").empty();

    getUsuarios();

    $("#usuarios").fadeIn(800);

});
$("#btnHistorico").click(function(){
        
    $("#infoAtivo").fadeOut(10);
    $("#atribuidos").fadeOut(10);
    $("#infoUser").fadeOut(10);
    $("#usuarios").fadeOut(10);
    
    $("#historico > tbody").empty();

    getEquipamentosHistorico();
    
    $("#historico").fadeIn(800);
});
    
$(document).on('click', '#linha', function(e) {
    e.preventDefault;
    //tdobj = $(this).parent().parent().find('td');
    tdobj = $(this).closest('tr').find('td');

    // lalala = Object.getOwnPropertyNames(tdobj);
    // alert(lalala);
    //  0,1,length,prevObject,context,selector


    $("#atribuidos").fadeOut(10);
    $("#historico").fadeOut(10);
    $("#infoUser").fadeOut(10);
    $("#usuarios").fadeOut(10);

    getInfoAtivo(tdobj[0].innerHTML);

    $("#infoAtivo").fadeIn(800);

});
    
$(document).on('click', '#linhaUser', function(e) {
    e.preventDefault;
    //tdobj = $(this).parent().parent().find('td');
    tdobj = $(this).closest('tr').find('td');

    // lalala = Object.getOwnPropertyNames(tdobj);
    // alert(lalala);
    //  0,1,length,prevObject,context,selector


    $("#atribuidos").fadeOut(10);
    $("#historico").fadeOut(10);
    $("#infoAtivo").fadeOut(10);
    $("#usuarios").fadeOut(10);

    getInfoUser(tdobj[0].innerHTML);

    $("#infoUser").fadeIn(800);

});

function getInfoAtivo(ativo){



    $.ajax({
        method: "POST",
        url: "php/acao.php",
        data: { action: "select", tipo: "ativo", id: ativo},
        dataType: "json",
        beforeSend : function(){
            //alert("Consultando...");
        }
    })
    .done(function( ret, textStatus, jqXHR ) {
        
        document.querySelector("[name='id']").value = ret.id;
        document.querySelector("[name='nome']").value = ret.nome;
        document.querySelector("[name='modelo']").value = ret.modelo;
        document.querySelector("[name='nota']").value = ret.nota;
        document.querySelector("[name='descricao']").value = ret.descricao;

        console.log(ret);
    })
    .fail(function( ret, textStatus, jqXHR ) {
        
        console.log(ret);
    })
    .always(function( ret, textStatus, jqXHR ){
        
        //console.log(ret);
    });

}

function getInfoUser(user){



    $.ajax({
        method: "POST",
        url: "php/acao.php",
        data: { action: "select", tipo: "user", id: user},
        dataType: "json",
        beforeSend : function(){
            //alert("Consultando...");
        }
    })
    .done(function( ret, textStatus, jqXHR ) {
        
        document.querySelector("[name='id-user']").value = ret.id;
        document.querySelector("[name='nome-user']").value = ret.nome;
        document.querySelector("[name='usuario-user']").value = ret.usuario;
        document.querySelector("[name='email-user']").value = ret.email;
        document.querySelector("[name='senha-user']").value = ret.senha;
        document.querySelector("[name='login-user']").value = ret.login;
        document.querySelector("[name='ativo-user']").value = ret.ativo;

        $("#atribuidos > tbody").empty();

        getEquipamentosAtribuidos(ret.id);

        $("#atribuidos").fadeIn(800);

        console.log(ret);
    })
    .fail(function( ret, textStatus, jqXHR ) {
        
        console.log(ret);
    })
    .always(function( ret, textStatus, jqXHR ){
        
        //console.log(ret);
    });

}

function getEquipamentosAtribuidos(idUser){

    $.ajax({
        method: "POST",
        url: "php/acao.php",
        data: { action: "select", tipo: "atribuidos", id: idUser},
        dataType: "json",
        beforeSend : function(){
            //alert("Consultando...");
        }
    })
    .done(function( ret, textStatus, jqXHR ) {
        

        for(let x = 0; x < ret.length; x++){

            $("#atribuidos > tbody").append("<tr id='linha' class='success'>"+
                                        "<td>"+ret[x].id+"</td>"+
                                        "<td>"+ret[x].ativo+"</td>"+
                                        "<td>"+ret[x].data_atribuicao+"</td>"+
                                      "</tr>");

        }
        console.log(ret);
    })
    .fail(function( ret, textStatus, jqXHR ) {
        
        console.log(ret);
    })
    .always(function( ret, textStatus, jqXHR ){
        
        //console.log(ret);
    });

}

function getUsuarios(){

    $.ajax({
        method: "POST",
        url: "php/acao.php",
        data: { action: "select", tipo: "usuarios"},
        dataType: "json",
        beforeSend : function(){
            //alert("Consultando...");
        }
    })
    .done(function( ret, textStatus, jqXHR ) {
        

        for(let x = 0; x < ret.length; x++){

            $("#usuarios > tbody").append("<tr id='linhaUser' class='success'>"+
                                        "<td>"+ret[x].id+"</td>"+
                                        "<td>"+ret[x].nome+"</td>"+
                                        "<td>"+ret[x].usuario+"</td>"+
                                      "</tr>");

        }
        console.log(ret);
    })
    .fail(function( ret, textStatus, jqXHR ) {
        
        console.log(ret);
    })
    .always(function( ret, textStatus, jqXHR ){
        
        //console.log(ret);
    });

}

function getEquipamentosHistorico(){

    $.ajax({
        method: "POST",
        url: "php/acao.php",
        data: { action: "select", tipo: "historico"},
        dataType: "json",
        beforeSend : function(){
            //alert("Consultando...");
        }
    })
    .done(function( ret, textStatus, jqXHR ) {
        

        var color = null;

        for(let x = 0; x < ret.length; x++){

            if(ret[x].data_retirada == null){
                ret[x].data_retirada = " ";
                color = "danger";
            }else{
                color = "success";
            }

            $("#historico > tbody").append("<tr id='linha' class='"+ color +"'>"+
                                        "<td>"+ret[x].id+"</td>"+
                                        "<td>"+ret[x].ativo+"</td>"+
                                        "<td>"+ret[x].data_atribuicao+"</td>"+
                                        "<td>"+ret[x].data_retirada+"</td>"+
                                      "</tr>");

        }
        console.log(ret);
    })
    .fail(function( ret, textStatus, jqXHR ) {
        
        console.log(ret);
    })
    .always(function( ret, textStatus, jqXHR ){
        
        //console.log(ret);
    });

}