<x-app-layout>
   <x-slot name="header">

   </x-slot>

   <div class="about-bg">

      <section class="about-home">
  
          <div class="about-content">
              <!--<h3>Quiénes Somos</h3>-->
              <p>Somos una empresa pionera en la fabricación y comercialización de productos ecológicos y orgánicos para el cuidado capilar, bajo la más alta calidad y estándares de sostenibilidad. <br>

               <br>Nuestra misión es ofrecer soluciones naturales que brinden resultados visibles y duraderos, respetando la salud natural del cabello. Utilizamos ingredientes de origen vegetal cuidadosamente seleccionados y cultivados de forma sostenible, y nos comprometemos con prácticas de producción responsables que minimizan el impacto ambiental.<br>
               
               <br>Creemos que la belleza real proviene de la salud y la armonía con el medio ambiente. Por eso, All Natural no es solo una marca de productos capilares, sino un estilo de vida consciente y sostenible.</p>
           
          </div>
  
      </section>
  
  </div>

  {{-- 

<section class="about">
   <div class="presentation-card">
      <div class="card-content">
         <h2>Quiénes Somos</h2>
         <p>En All Natural nos apasiona el cuidado del cabello y la salud del planeta. Somos una empresa pionera en la fabricación y comercialización de productos ecológicos y orgánicos para el cuidado capilar, bajo la más alta calidad y estándares de sostenibilidad.<br>

         <br>Nuestra misión es ofrecer soluciones naturales que brinden resultados visibles y duraderos, respetando la salud natural del cabello. Utilizamos ingredientes de origen vegetal cuidadosamente seleccionados y cultivados de forma sostenible, y nos comprometemos con prácticas de producción responsables que minimizan el impacto ambiental.<br>
         
         <br>Creemos que la belleza real proviene de la salud y la armonía con el medio ambiente. Por eso, All Natural no es solo una marca de productos capilares, sino un estilo de vida consciente y sostenible.</p><br>
         <a href="{{ route('shop.index') }}" class="btn">Nuestros Productos</a>
      </div>
   </div>
   <!-- Resto del contenido de la sección about -->
</section>
 --}}

<section class="reviews">
   <div class="box-container">
      <div class="box">
      <center>   <img src="images/icons/objetivo.png" alt=""></center>
         <h3>Misión</h3>
         <p>Nuestra misión en All Natural es crear productos de cuidado capilar ecológicos y orgánicos que promuevan la salud del cabello y del planeta. Nos comprometemos a utilizar ingredientes naturales de alta calidad y materiales reciclados para reducir el impacto ambiental y ofrecer una experiencia de cuidado capilar que sea amigable con el medio ambiente.</p>
      </div>
      <div class="box">
        <center><img src="images/icons/vision.png" alt=""></center> 
         <h3>Visión</h3>
         <p>Nos esforzamos por convertirnos en líderes reconocidos en la industria del cuidado capilar, generando ganancias sostenibles mientras ofrecemos productos innovadores y un servicio excepcional. Visualizamos un futuro en el que All Natural sea sinónimo de excelencia en el cuidado capilar y un modelo a seguir en términos de sostenibilidad y responsabilidad ambiental.</p>
      </div>
      <div class="box">
         <center><img src="images/icons/valores.png" alt=""></center>
         <h3>Nuestros Valores</h3>
         <p>En All Natural, nuestros valores son nuestra guía.</p><br>
         <p>
            <span class="value">Sostenibilidad</span><br>
            <span class="value">Calidad</span><br>
            <span class="value">Innovación</span><br>
            <span class="value">Empatía</span><br>
            <span class="value">Transparencia</span><br>
            <span class="value">Compromiso</span>
         </p>
      </div>
   </div>
</section>

<div class="big-card">
   <div class="card-section text-section">
      <h2>¿Por qué elegir All Natural?</h2><br>
       <p>En All Natural, nos dedicamos a crear productos de cuidado capilar ecológicos y orgánicos que no solo promueven la salud del cabello, sino también la del planeta. Nuestra misión es clara: utilizar ingredientes naturales de alta calidad y materiales reciclados para reducir el impacto ambiental, ofreciendo una experiencia de cuidado capilar amigable con el medio ambiente.<br>

        <br>Nos esforzamos por convertirnos en líderes reconocidos en la industria del cuidado capilar, generando ganancias sostenibles mientras ofrecemos productos innovadores y un servicio excepcional. Visualizamos un futuro en el que All Natural sea sinónimo de excelencia en el cuidado capilar y un modelo a seguir en términos de sostenibilidad y responsabilidad ambiental.</p>
   </div>
   <div class="card-section image-section">
       <img src="images/icons/valores.png" alt="Imagen 1">
   </div>
   <div class="card-section image-section">
       <img src="ruta-a-la-imagen2.jpg" alt="Imagen 2">
   </div>
   <div class="card-section text-section">
      <h2>Por qué elegir All Natural</h2>
       <p>Texto en la última esquina</p>
   </div>
</div>


<x-slot name="footer">

</x-slot>
</x-app-layout>
