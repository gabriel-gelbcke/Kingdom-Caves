<script>
    function sim()
    {
        // document.getElementById("opa").style="color:red;";
        var vamo = document.querySelectorAll("[id='opa']");

        for(var i = 0; i < vamo.length; i++) 
        vamo[i].style.color='red';
    }
</script>

<a id='opa'>1</a>
<a id='opa'>2</a>
<a id='opa'>3</a>
<a id='opa'>4</a>
<a id='opa'>5</a>
<a id='opa'>6</a>

<script>sim();</script>