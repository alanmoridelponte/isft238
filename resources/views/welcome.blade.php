@php use App\Settings\GeneralSettings; @endphp
<html lang="es"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ app(GeneralSettings::class)->institute_initialism}} - {{ app(GeneralSettings::class)->institute_name}}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    @vite('resources/css/app.css')
    <body class="bg-gray-50" cz-shortcut-listen="true">
    <!-- Header -->
    <header class="bg-blue-900 text-white">
        <!-- Top Bar -->
        <div class="container mx-auto px-4 py-2 flex justify-between items-center text-sm">
            <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-200">Estudiantes</a>
                <a href="#" class="hover:text-blue-200">Docentes</a>
                <a href="#" class="hover:text-blue-200">Graduados</a>
            </div>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-blue-200"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-blue-200"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-blue-200"><i class="fab fa-instagram"></i></a>
                <a href="#" class="hover:text-blue-200"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>

        <!-- Main Navigation -->
        <nav class="bg-white text-blue-900 shadow-md">
            <div class="container mx-auto px-4">
                <div class="flex justify-between items-center py-4">
                    <a href="#" class="text-2xl font-bold">ISFT 238</a>

                    <div class="hidden md:flex space-x-8">
                        <a href="#" class="hover:text-blue-600 font-medium">Institucional</a>
                        <a href="#" class="hover:text-blue-600 font-medium">Carreras</a>
                        <a href="#" class="hover:text-blue-600 font-medium">Admisión</a>
                        <a href="#" class="hover:text-blue-600 font-medium">Investigación</a>
                        <a href="#" class="hover:text-blue-600 font-medium">Extensión</a>
                        <a href="#" class="hover:text-blue-600 font-medium">Noticias</a>
                    </div>

                    <div class="md:hidden">
                        <button class="text-blue-900">
                            <i class="fas fa-bars text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Banner -->
    <section class="relative">
        <div class="bg-blue-800 h-[500px] relative overflow-hidden">
            <img src="https://cdn.pixabay.com/photo/2018/03/21/09/33/classroom-3246597_1280.jpg" alt="Campus ISFT 238" class="w-full h-full object-cover opacity-40 absolute">
            <div class="container mx-auto px-4 h-full flex items-center relative z-10">
                <div class="max-w-2xl text-white">
                    <h1 class="text-4xl md:text-5xl font-bold mb-4">Formando profesionales para el futuro</h1>
                    <p class="text-xl mb-8">El Instituto Superior de Formación Técnica N°238 ofrece educación de calidad con enfoque práctico y adaptado al mundo laboral.</p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-white text-blue-900 px-6 py-3 rounded-md font-medium hover:bg-blue-100 transition duration-300">Conoce nuestras carreras</a>
                        <a href="#" class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-md font-medium hover:bg-white hover:text-blue-900 transition duration-300">Inscripciones abiertas</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-blue-50 p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-800 text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-graduation-cap text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-blue-900">Oferta Académica</h3>
                    <p class="text-gray-600 mb-4">Descubre nuestras tecnicaturas en Administración, Enfermería, Turismo y Prácticas Deportivas.</p>
                    <a href="#" class="text-blue-700 font-medium flex items-center">
                        Explorar carreras <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="bg-blue-50 p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-800 text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-users text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-blue-900">Comunidad Educativa</h3>
                    <p class="text-gray-600 mb-4">Forma parte de una comunidad comprometida con la excelencia y el desarrollo profesional.</p>
                    <a href="#" class="text-blue-700 font-medium flex items-center">
                        Conocer más <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>

                <div class="bg-blue-50 p-8 rounded-lg shadow-sm hover:shadow-md transition duration-300">
                    <div class="w-16 h-16 bg-blue-800 text-white rounded-full flex items-center justify-center mb-4">
                        <i class="fas fa-building text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-3 text-blue-900">Inserción Laboral</h3>
                    <p class="text-gray-600 mb-4">Formamos profesionales con las competencias que el mercado laboral demanda actualmente.</p>
                    <a href="#" class="text-blue-700 font-medium flex items-center">
                        Ver oportunidades <i class="fas fa-arrow-right ml-2"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Novedades</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Mantente al día con las últimas noticias y eventos del ISFT 238</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2015/07/31/11/45/library-869061_1280.jpg" alt="Noticia 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">10 Junio, 2024</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Nuevas instalaciones para la Tecnicatura en Enfermería</h3>
                        <p class="text-gray-600 mb-4">El ISFT 238 inaugura un moderno laboratorio de prácticas para estudiantes de Enfermería.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2017/07/31/11/31/laptop-2557468_1280.jpg" alt="Noticia 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">5 Junio, 2024</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Convenio con empresas locales para prácticas profesionales</h3>
                        <p class="text-gray-600 mb-4">Estudiantes de Administración podrán realizar prácticas en importantes empresas de la región.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2018/01/17/07/06/laptop-3087585_1280.jpg" alt="Noticia 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">1 Junio, 2024</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Jornada de orientación vocacional para futuros ingresantes</h3>
                        <p class="text-gray-600 mb-4">El instituto abrirá sus puertas para que los interesados conozcan las carreras disponibles.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="text-center mt-10">
                <a href="#" class="bg-blue-800 text-white px-6 py-3 rounded-md font-medium hover:bg-blue-700 transition duration-300">Ver todas las noticias</a>
            </div>
        </div>
    </section>

    <!-- Numbers and Stats -->
    <section class="py-16 bg-blue-900 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">4</div>
                    <p class="text-blue-200">Carreras Técnicas</p>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">500+</div>
                    <p class="text-blue-200">Estudiantes Activos</p>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">35</div>
                    <p class="text-blue-200">Docentes Especializados</p>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">90%</div>
                    <p class="text-blue-200">Inserción Laboral</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold text-blue-900 mb-2">Testimonios</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Conoce las experiencias de nuestra comunidad educativa</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"La formación práctica que recibí en el ISFT 238 me permitió insertarme rápidamente en el mercado laboral. Los profesores están muy comprometidos con el aprendizaje de los alumnos."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-800 font-bold">ML</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Martín López</h4>
                            <p class="text-gray-500 text-sm">Graduado en Administración</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Las prácticas profesionales fueron fundamentales para mi desarrollo. El instituto tiene excelentes convenios con instituciones de salud que facilitan la inserción laboral."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-800 font-bold">CR</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Carla Rodríguez</h4>
                            <p class="text-gray-500 text-sm">Estudiante de Enfermería</p>
                        </div>
                    </div>
                </div>

                <div class="bg-gray-50 p-6 rounded-lg shadow-sm">
                    <div class="text-yellow-400 mb-4">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-600 mb-6 italic">"Como docente, valoro el compromiso institucional con la calidad educativa. El instituto invierte constantemente en mejorar sus recursos y la capacitación del personal."</p>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-blue-200 rounded-full flex items-center justify-center mr-4">
                            <span class="text-blue-800 font-bold">JG</span>
                        </div>
                        <div>
                            <h4 class="font-bold">Jorge Gómez</h4>
                            <p class="text-gray-500 text-sm">Profesor de Turismo</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-blue-50">
        <div class="container mx-auto px-4">
            <div class="bg-white rounded-lg shadow-md p-8 md:p-12 max-w-5xl mx-auto">
                <div class="flex flex-col md:flex-row items-center">
                    <div class="md:w-2/3 mb-6 md:mb-0 md:pr-8">
                        <h2 class="text-3xl font-bold text-blue-900 mb-4">¿Listo para dar el próximo paso en tu formación profesional?</h2>
                        <p class="text-gray-600 mb-6">Inscripciones abiertas para todas nuestras carreras. No pierdas la oportunidad de formarte como profesional en el ISFT 238.</p>
                        <div class="flex flex-wrap gap-4">
                            <a href="#" class="bg-blue-800 text-white px-6 py-3 rounded-md font-medium hover:bg-blue-700 transition duration-300">Inscribirme ahora</a>
                            <a href="#" class="bg-blue-100 text-blue-900 px-6 py-3 rounded-md font-medium hover:bg-blue-200 transition duration-300">Más información</a>
                        </div>
                    </div>
                    <div class="md:w-1/3">
                        <img src="https://cdn.pixabay.com/photo/2018/01/17/07/06/laptop-3087585_1280.jpg" alt="Inscripciones" class="rounded-lg shadow-sm">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white pt-16 pb-6">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                <div>
                    <h3 class="text-xl font-bold mb-4">ISFT 238</h3>
                    <p class="text-gray-400 mb-4">Instituto Superior de Formación Técnica N°238</p>
                    <div class="flex space-x-4 mb-4">
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-gray-400 hover:text-white"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Enlaces rápidos</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Institucional</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Carreras</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Admisión</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Campus virtual</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Noticias</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Carreras</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white">Téc. en Administración</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Téc. en Enfermería</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Téc. en Turismo</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white">Téc. en Prácticas Deportivas</a></li>
                    </ul>
                </div>

                <div>
                    <h3 class="text-lg font-bold mb-4">Contacto</h3>
                    <ul class="space-y-2 text-gray-400">
                        <li class="flex items-start">
                            <i class="fas fa-map-marker-alt mt-1 mr-3"></i>
                            <span>Av. San Martín y Luis Sáenz Peña, Camet Norte, Mar Chiquita, Buenos Aires</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-phone mr-3"></i>
                            <span>(223) 456-7890</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3"></i>
                            <span>info@isft238.edu.ar</span>
                        </li>
                    </ul>
                </div>
            </div>

            <hr class="border-gray-800 mb-6">

            <div class="text-center text-gray-500 text-sm">
                <p>© 2024 Instituto Superior de Formación Técnica N°238. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <!-- Blog/Post Page (After Footer) -->
    <div class="border-t-8 border-blue-800 mt-12"></div>
    <section class="py-16 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-12">
                <a href="#" class="text-blue-600 mb-2 inline-block">Volver a inicio</a>
                <h1 class="text-4xl font-bold text-blue-900 mb-4">Noticias y Novedades</h1>
                <p class="text-gray-600 max-w-3xl mx-auto">Mantente informado sobre las últimas actividades y eventos del Instituto Superior de Formación Técnica N°238</p>
            </div>

            <!-- Featured Post -->
            <div class="bg-gray-50 rounded-lg overflow-hidden shadow-md mb-12">
                <div class="md:flex">
                    <div class="md:w-1/2">
                        <img src="https://cdn.pixabay.com/photo/2015/07/31/11/45/library-869061_1280.jpg" alt="Post destacado" class="w-full h-full object-cover">
                    </div>
                    <div class="md:w-1/2 p-8">
                        <span class="text-blue-600 text-sm font-medium">15 Junio, 2024 • Institucional</span>
                        <h2 class="text-2xl font-bold mb-4 mt-2">El ISFT 238 celebra su aniversario con la inauguración de nuevas instalaciones</h2>
                        <p class="text-gray-600 mb-6">Con la presencia de autoridades educativas y municipales, el instituto inauguró nuevos espacios para el desarrollo académico y profesional de sus estudiantes. Las instalaciones cuentan con tecnología de punta y están diseñadas para ofrecer una experiencia educativa de alta calidad.</p>
                        <a href="#" class="bg-blue-800 text-white px-6 py-3 rounded-md font-medium hover:bg-blue-700 transition duration-300 inline-block">Leer artículo completo</a>
                    </div>
                </div>
            </div>

            <!-- Post Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2016/11/29/09/38/adult-1868982_1280.jpg" alt="Noticia 1" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">10 Junio, 2024 • Académico</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Nuevas especializaciones para la Tecnicatura en Enfermería</h3>
                        <p class="text-gray-600 mb-4">El ISFT 238 amplía su oferta académica con especializaciones en áreas de alta demanda como Emergentología y Cuidados Intensivos.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2017/07/31/11/31/laptop-2557468_1280.jpg" alt="Noticia 2" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">5 Junio, 2024 • Extensión</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Convenio con empresas locales para prácticas profesionales</h3>
                        <p class="text-gray-600 mb-4">Estudiantes de las distintas tecnicaturas podrán realizar prácticas en importantes empresas de la región para complementar su formación.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2015/01/09/11/08/startup-594090_1280.jpg" alt="Noticia 3" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">1 Junio, 2024 • Eventos</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Jornada de orientación vocacional para futuros ingresantes</h3>
                        <p class="text-gray-600 mb-4">El instituto abrirá sus puertas para que los interesados conozcan las carreras disponibles y reciban asesoramiento personalizado.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2015/07/17/22/43/student-849825_1280.jpg" alt="Noticia 4" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">28 Mayo, 2024 • Estudiantes</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Estudiantes de Turismo organizan visita guiada por sitios históricos</h3>
                        <p class="text-gray-600 mb-4">Como parte de su formación práctica, los alumnos de la Tecnicatura en Turismo organizaron un recorrido por lugares emblemáticos.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2018/03/10/12/00/teamwork-3213924_1280.jpg" alt="Noticia 5" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">25 Mayo, 2024 • Institucional</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">El ISFT 238 participa en el proyecto de desarrollo local</h3>
                        <p class="text-gray-600 mb-4">Docentes y estudiantes del instituto formarán parte de un importante proyecto para el desarrollo económico y social de la región.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>

                <div class="bg-white rounded-lg overflow-hidden shadow-sm border border-gray-100 hover:shadow-md transition duration-300">
                    <img src="https://cdn.pixabay.com/photo/2018/05/19/01/23/online-3412473_1280.jpg" alt="Noticia 6" class="w-full h-48 object-cover">
                    <div class="p-6">
                        <span class="text-blue-600 text-sm font-medium">20 Mayo, 2024 • Tecnología</span>
                        <h3 class="text-xl font-bold mb-2 mt-1">Se implementa nueva plataforma digital para estudiantes</h3>
                        <p class="text-gray-600 mb-4">El instituto incorporó un moderno campus virtual para facilitar el acceso a materiales educativos y mejorar la comunicación entre docentes y alumnos.</p>
                        <a href="#" class="text-blue-700 font-medium flex items-center">
                            Leer más <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex" aria-label="Pagination">
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-white border border-gray-300 text-blue-800 hover:bg-blue-50">Anterior</a>
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-blue-800 text-white border border-blue-800">1</a>
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-white border border-gray-300 text-blue-800 hover:bg-blue-50">2</a>
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-white border border-gray-300 text-blue-800 hover:bg-blue-50">3</a>
                    <span class="px-4 py-2 mx-1 text-gray-600">...</span>
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-white border border-gray-300 text-blue-800 hover:bg-blue-50">8</a>
                    <a href="#" class="px-4 py-2 mx-1 rounded-md bg-white border border-gray-300 text-blue-800 hover:bg-blue-50">Siguiente</a>
                </nav>
            </div>
        </div>
    </section>

    <!-- Blog Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="container mx-auto px-4 text-center text-gray-500 text-sm">
            <p>© 2024 Instituto Superior de Formación Técnica N°238. Todos los derechos reservados.</p>
        </div>
    </footer>


</body></html>
