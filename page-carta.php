<?php 
/*
 *  Template name: carta
 * 
 * 
 * 
 * 
 */
 get_header();
 echo 'aqui vá mi supercarta con el codigo en page-carta.php <br>';

?>



<div class="container">
<h1>PRIMEROS</h1>
<?php  
$primeros = new WP_Query([ // esta query es para que salga todo
    'posts_per_page' => -1,
    'post_type' => 'producto',
    'tax_query' => array(   // consulta de taxonomias    
   array(
       'taxonomy' => 'tipo',
       'field' => 'slug',
       'terms' => 'primeros'       
    ))
    ]);
    
    while($primeros->have_posts()) :  
        $primeros->the_post();
   get_template_part('template-lista-platos');
   echo '<br>';
   endwhile;
   wp_reset_postdata();
   ?>
   </div>

 

   <div class="container">
   <H1>SEGUNDOS</H1>
<?php  
$primeros = new WP_Query([ // esta query es para que salga todo
    'posts_per_page' => -1,
    'post_type' => 'producto',
    'tax_query' => array(   // consulta de taxonomias    
   array(
       'taxonomy' => 'tipo',
       'field' => 'slug',
       'terms' => 'segundos'       
    ))
    ]);
    
    while($primeros->have_posts()) :  
        $primeros->the_post();
   get_template_part('template-lista-platos');
   echo '<br>';
   endwhile;
   wp_reset_postdata();
   ?>
   </div>


   <div class="container">
   <H1>POSTRES</H1>
<?php  
$primeros = new WP_Query([ // esta query es para que salga todo
    'posts_per_page' => -1,
    'post_type' => 'producto',
    'tax_query' => array(   // consulta de taxonomias    
   array(
       'taxonomy' => 'tipo',
       'field' => 'slug',
       'terms' => ' postres'       
    ))
    ]);
    
    while($primeros->have_posts()) :  
        $primeros->the_post();
   get_template_part('template-lista-platos');
   echo '<br>';
   endwhile;
   wp_reset_postdata();
   ?>
   </div>

   <div class="container">
   <H1>BEBIDAS</H1>
<?php  
$primeros = new WP_Query([ // esta query es para que salga todo
    'posts_per_page' => -1,
    'post_type' => 'producto',
    'tax_query' => array(   // consulta de taxonomias    
   array(
       'taxonomy' => 'tipo',
       'field' => 'slug',
       'terms' => 'bebidas'       
    ))
    ]);
    
    while($primeros->have_posts()) :  
        $primeros->the_post();
   get_template_part('template-lista-platos');
   echo '<br>';
   endwhile;
   wp_reset_postdata();
   ?>
   </div>


  

<?php 
 echo '<h1>------------desde aquí con la técnica de Gonzalo-------- </h1><br>';
   $primeros = new WP_Query([ // esta query es para que salga todo
    'posts_per_page' => -1,
    'post_type' => 'producto',
    'tax_query' => array(   // consulta de taxonomias    
        
        'relation' => 'or',
   array(
       'taxonomy' => 'tipo',
       'field' => 'slug',
       'terms' => 'primeros'
       
    ),
   array(
    'taxonomy' => 'tipo',
    'field' => 'slug',
    'terms' => 'segundos'
    
 ),
array(
    'taxonomy' => 'tipo',
    'field' => 'slug',
    'terms' => 'postres'
    
 ),
array(
    'taxonomy' => 'tipo',
    'field' => 'slug',
    'terms' => 'bebidas',
    
) )

    ]);
    
while($primeros->have_posts()) :  
     $primeros->the_post();
get_template_part('template-lista-platos');
echo '<br>';
endwhile;
wp_reset_postdata();

























 get_footer();
?>
<!-- aqui desarrollamos el codigo del la pagina child 
<h1>hola mundo h1 en html</h1>
Esta será mi supercarta a pelo-->





