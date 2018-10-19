@component('mail::message')

¡Hola!

<p>Bienvenido(a) a Dash Reading</p>
<p>¡Nos da gusto tenerte aquí!</p>
<p>Por favor da click en el siguiente botón para confirmar tu correo electrónico</p>

@component('mail::button', ['url' => url($url) , 'color' => 'blue'])
Confirmar
@endcomponent

¡Gracias por unirte!<br>
Dash Reading
@endcomponent
