$(document).ready(function() {
    // when click in register >login  text
    $('.login').click(function() {
        $("#login").click();
    });
    //  when click in  login > register 
    $(".signup").click(function() {
        toogleL()
        $("#register").click();

    });
    // ticket booking > continue
    // $("#TB_confirm").click(function() {
    //     $("#login").click();
    // // block past date in js
    // $("#datep").datepicker({
    //     minDate: 0
    // });
    // ticket payment > continue

    // $("#TB_confirm").click(function() {
    //     toggleTD().click();
    // });
    // $("#form_payment").click(function() {
    //     toggleTF().click();
    // });
    // notice 
    // $("#notice_click").click(function() {
    //     toggleN()  });

});