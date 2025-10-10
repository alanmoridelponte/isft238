# Sitio y Blog de ISFT 238

Este repositorio contiene el código fuente del sitio institucional y blog del **Instituto Superior de Formación Técnica N° 238** (ISFT 238). El sitio está disponible en: https://isft238.edu.ar/

---

## Objetivo

El propósito de este proyecto es:

- Proveer una página de inicio institucional que presente al instituto, sus carreras, noticias y contacto.
- Mantener un blog o sección de novedades (revista digital) para publicar artículos, eventos e información relevante para la comunidad educativa.
- Servir como plataforma centralizada, moderna y mantenible para el instituto.

---

## Estructura del proyecto

A continuación un resumen de los directorios y archivos más relevantes:

```
/
├── app/                # Lógica de la aplicación (controladores, modelos, etc.)
├── bootstrap/          # Archivos de arranque
├── config/             # Configuración del proyecto
├── database/           # Migraciones, seeds, estructura de la base de datos
├── lang/               # Archivos de localización / traducción
├── public/             # Archivos públicos: CSS, JS, imágenes, punto de entrada
├── resources/           # Vistas, assets originales, plantillas
├── routes/             # Definición de rutas (web, API, etc.)
├── storage/            # Archivos generados, cache, logs
├── tests/               # Pruebas automatizadas
├── .env.example         # Ejemplo de archivo de variables de entorno
├── composer.json        # Dependencias del backend (PHP / Laravel, u otro framework)
├── package.json         # Dependencias del frontend / tooling JS
├── vite.config.js       # Configuración de bundler / build frontend
└── README.md            # Este archivo
```

---

## 🛠️ Tecnologías y dependencias

Este proyecto puede involucrar una o más de las siguientes tecnologías:

- Backend: PHP con framework **Laravel** y *FilamentPHP*
- Frontend: JavaScript, bundler Vite
- Plantillas: Blade
- Base de datos: MySQL
- Librerías CSS/JS: Tailwind

> Ver archivos `composer.json` y `package.json` para los paquetes y versiones específicas.

---

## Instalación y despliegue

Estos son los pasos generales para instalar y ejecutar localmente:

1. Clonar el repositorio  
   ```bash
   git clone https://github.com/ISFT238/sitio-y-blog.git
   cd sitio-y-blog
   ```

2. Configurar entorno  
   - Copiar `.env.example` a `.env` y completar las variables (base de datos, credenciales, dominio, etc.)  
   - Generar clave de aplicación (si aplica)  
     ```bash
     php artisan key:generate
     ```

3. Instalar dependencias  
   ```bash
   composer install
   npm install
   ```

4. Migrar base de datos y (opcional) poblar datos de prueba  
   ```bash
   php artisan migrate
   php artisan db:seed   # si hay seeds disponibles
   ```

5. Compilar assets  
   ```bash
   npm run dev        # modo desarrollo
   npm run build      # producción
   ```

6. Iniciar servidor local  
   ```bash
   php artisan serve
   ```

   Luego acceder en el navegador a `http://localhost:8000` (o el puerto que corresponda).

7. En producción: apuntar el dominio al directorio `public/`, configurar servidor web (Nginx, Apache), certificados SSL, permisos, etc.

---

## Configuración de Git y sincronización con el repositorio remoto

Si estás configurando este proyecto por primera vez en tu entorno local, seguí estos pasos para vincular tu copia con el repositorio oficial, primero haz un fork de este repositiorio y luego configura tu git local:

### 1. Clonar el repositorio

```bash
git clone https://github.com/TU-USUARIO/sitio-y-blog.git
cd sitio-y-blog
```

### 2. Verificar el remoto actual

```bash
git remote -v
```

Deberías ver algo como:
```
origin  https://github.com/TU-USUARIO/sitio-y-blog.git (fetch)
origin  https://github.com/TU-USUARIO/sitio-y-blog.git (push)
```

Si no aparece o querés cambiarlo, podés configurarlo así:

```bash
git remote remove origin
git remote add origin https://github.com/TU-USUARIO/sitio-y-blog.git
```

### 3. Configurar el *upstream* (repositorio principal)

Esto se usa si tu copia es un **fork** y querés mantenerla sincronizada con el repo original:

```bash
git remote add upstream https://github.com/ISFT238/sitio-y-blog.git
```

Podés verificarlo con:
```bash
git remote -v
```

### 4. Sincronizar tu rama local

Para traer los últimos cambios del proyecto oficial:

```bash
git fetch upstream
git checkout main
git merge upstream/main
```

### 5. Subir tus cambios

Una vez hechos tus commits:

```bash
git add .
git commit -m "Descripción del cambio"
git push origin main
```

Si es la primera vez que hacés push:

```bash
git push --set-upstream origin main
```

---

**Tip:** Si colaborás frecuentemente, podés automatizar el *fetch* y *merge* con:
```bash
git pull upstream main
```
para mantener tu copia actualizada con el repositorio del ISFT 238.

---

## 🧩 Uso y contribución

Si quieres aportar al proyecto:

- Abre un **issue** para sugerir mejoras, reportar bugs o proponer nuevas funciones.
- Realiza **fork** del repositorio y crea una rama de trabajo.
- Envía **pull request** cuando tu cambio esté completo y probado.
- Asegúrate de mantener la consistencia con las convenciones del proyecto (estilo de código, convenciones de nombres, etc.).

---

## 📫 Contacto

Para dudas, sugerencias o soporte:

- Correo del instituto: contacto@isft238.edu.ar  
- Dirección: Calle Sáenz Peña 513, esquina Av. San Martín, Camet Norte  
- Teléfono: (223) 438‑2392  

---

## 🏛️ Acerca de ISFT 238

El ISFT 238 es un instituto de formación técnica con fuerte compromiso social, que ofrece **carreras con reconocimiento oficial** y orientadas a las necesidades del mercado laboral. ([isft238.edu.ar](https://isft238.edu.ar/))

Entre sus carreras se encuentran:

- Tecnicatura Superior en IoT y Sistemas Embebidos ([isft238.edu.ar](https://isft238.edu.ar/))  
- Tecnicatura Superior en Turismo ([isft238.edu.ar](https://isft238.edu.ar/))  
- Tecnicatura Superior en Interpretación y Traducción en Lengua de Señas Argentina / Español ([isft238.edu.ar](https://isft238.edu.ar/))  
- Tecnicatura Superior en Enfermería ([isft238.edu.ar](https://isft238.edu.ar/))  
- Tecnicatura Superior en Administración General ([isft238.edu.ar](https://isft238.edu.ar/))  
- Tecnicatura Superior en Prácticas Deportivas ([isft238.edu.ar](https://isft238.edu.ar/))  

La sección de noticias o “Revista Digital ISFT 238” se propone como espacio de difusión de saberes y experiencias institucionales. ([isft238.edu.ar](https://isft238.edu.ar/))
