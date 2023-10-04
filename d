[1mdiff --git a/resources/views/Karts/index.blade.php b/resources/views/Karts/index.blade.php[m
[1mindex 336d30f..d1574bd 100644[m
[1m--- a/resources/views/Karts/index.blade.php[m
[1m+++ b/resources/views/Karts/index.blade.php[m
[36m@@ -5,7 +5,7 @@[m
     <h1 class="h3 mb-4 text-gray-800">KARTS</h1>[m
 [m
     <div class="card">[m
[31m-        <div class = "card-header">[m
[32m+[m[32m        <div class="card-header">[m
             Lista dos KARTS[m
         </div>[m
         <div class="card-body">[m
[36m@@ -15,7 +15,8 @@[m
                     <th>Numero do KART</th>[m
                     <th>Media de Tempo</th>[m
                     <th>Quantidade de Baterias</th>[m
[31m-                    <th><a href="#" class="btn btn-primary ordenar" data-ordenar="asc"><li class="fa fa-arrow-up"></li></a>[m
[32m+[m[32m                    <th>[m
[32m+[m[32m                        <a href="#" class="btn btn-primary ordenar" data-ordenar="asc"><li class="fa fa-arrow-up"></li></a>[m
                         <a href="#" class="btn btn-primary ordenar" data-ordenar="desc"><li class="fa fa-arrow-down"></li></a>[m
                     </th>[m
                 </thead>[m
[36m@@ -29,9 +30,8 @@[m
                             <td><a href="{{ url("karts/" . $kart['numKart']) }}" class="btn btn-info"><li class="fa fa-search"></li></a></td>[m
                         </tr>[m
                     @endforeach[m
[31m-[m
                 </tbody>[m
[32m+[m[32m            </table>[m
         </div>[m
     </div>[m
[31m-    </table>[m
 @endsection[m
[1mdiff --git a/resources/views/Karts/inspect.blade.php b/resources/views/Karts/inspect.blade.php[m
[1mindex ace120e..b834813 100644[m
[1m--- a/resources/views/Karts/inspect.blade.php[m
[1m+++ b/resources/views/Karts/inspect.blade.php[m
[36m@@ -10,16 +10,19 @@[m
                 <thead>[m
                     <th>Nome do Piloto</th>[m
                     <th>Melhor Volta</th>[m
[32m+[m[32m                    <th>Ação</th>[m
                 </thead>[m
                 <tbody>[m
                     @foreach ($voltas as $volta)[m
                         <tr>[m
                             <td>{{ $volta->nomePiloto }}</td>[m
                             <td>{{ $volta->melhorVolta }}</td>[m
[32m+[m[32m                            <td><a href="#" class="btn btn-danger"><li class="fa fa-times"></li></a></td>[m
                         </tr>[m
                     @endforeach[m
                 </tbody>[m
[31m-                </div>[m
[31m-            </div>[m
             </table>[m
[32m+[m[32m        </div>[m
[32m+[m[32m    </div>[m
[32m+[m
 @endsection[m
[1mdiff --git a/resources/views/Tables/index.blade.php b/resources/views/Tables/index.blade.php[m
[1mindex ed84dec..0efc12f 100644[m
[1m--- a/resources/views/Tables/index.blade.php[m
[1m+++ b/resources/views/Tables/index.blade.php[m
[36m@@ -2,11 +2,11 @@[m
 [m
 @section('contents')[m
     <!-- Page Heading -->[m
[31m-    <h1 class="h3 mb-4 text-gray-800">Tabela</h1>[m
[32m+[m[32m    <h1 class="h3 mb-4 text-gray-800">Tabelas</h1>[m
 [m
[31m-   <div class="card">[m
[31m-        <div class = "card-header">[m
[31m-            Lista de Marcas[m
[32m+[m[32m    <div class="card">[m
[32m+[m[32m        <div class="card-header">[m
[32m+[m[32m            Ranking geral[m
         </div>[m
         <div class="card-body">[m
             <table class="table table-bordered dataTable">[m
[36m@@ -31,4 +31,7 @@[m
                     @endforeach[m
                 </tbody>[m
             </table>[m
[32m+[m[32m        </div>[m
[32m+[m[32m    </div>[m
[32m+[m
 @endsection[m
[1mdiff --git a/resources/views/TemplateUser/index.blade.php b/resources/views/TemplateUser/index.blade.php[m
[1mindex 29571fa..dc49857 100644[m
[1m--- a/resources/views/TemplateUser/index.blade.php[m
[1m+++ b/resources/views/TemplateUser/index.blade.php[m
[36m@@ -33,7 +33,7 @@[m
         <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">[m
 [m
             <!-- Sidebar - Brand -->[m
[31m-            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">[m
[32m+[m[32m            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">[m
                 <div class="sidebar-brand-icon rotate-n-15">[m
                     <i class="fas fa-laugh-wink"></i>[m
                 </div>[m
