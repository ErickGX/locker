<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="/public/assets/css/styleAdm.css">
	<title>Administração</title>
</head>
<body>
	<div class="main-login">

		<div class="pt-direita-login">

			<div class="card-login">

				<h1>Administração</h1>

				<div class="form" id="Forms">
					
					<label for="cpf">CPF</label>
                    <input type="number" name="cpf" id="cpf" placeholder="DIGITE SEU CPF" class="input required" oninput="cpfValidate();" max="11"/>

                    <span class="span-required">CPF invalido</span>
				</div>
				<div class="form" id="Forms">

					<label for="senha">Senha</label>
					<input type="password" name="password" id="password" placeholder="DIGITE UMA SENHA" class="input required" oninput="senhaValidate();" >

                    <span class="span-required">Senha com no mínimo 8 caracteres</span>
				</div>

				<button class="bnt-login"><a href="#">Entrar</a></button>

			</div>
		</div>

		


	</div><!--main-login-->
    <script>
        const form = document.getElementById('Forms');
        const campos = document.querySelectorAll('.required');
        const spans = document.querySelectorAll('.span-required');
        const cpfRegex = /^([0-9]{3}\.?[0-9]{3}\.?[0-9]{3}\-?[0-9]{2}|[0-9]{2}\.?[0-9]{3}\.?[0-9]{3}\/?[0-9]{4}\-?[0-9]{2})$/;


    form.addEventListener('submit', (event) => {
        event.preventDefault();
        senhaValidate();
        cpfValidate(); 
    }
    );

    function setError(index){
        campos[index].style.border='1px solid #e63636';
        spans[index].style.display = 'Block';
    }

    function RemoveError(index){
        campos[index].style.border='';
        spans[index].style.display = 'none';
    }
   
     function senhaValidate(){
         if (campos[1].value.length<8)
         {
             setError(1);
         }
         else
         {
             RemoveError(1);
         }
     }
    
    function cpfValidate(){
        if (cpfRegex.test(campos[0].value))
        {
            RemoveError(0);
        }
        else
        {
           setError(0);
        }
    }

     </script>
</body>
</html>