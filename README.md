# 🧩 Proyecto DSI

Repositorio del proyecto **DSI** desarrollado colaborativamente por el equipo.  
Este proyecto sigue la arquitectura **MVC en PHP** y está pensado para prácticas de desarrollo web.

---

## 🚀 Clonar el proyecto

Asegúrate de tener **Git** instalado en tu computadora.  
Luego, en tu terminal ejecuta:

```bash
git clone https://github.com/ZETAPRO24/DSI.git
cd DSI
```

Esto descargará el repositorio y te ubicará dentro del proyecto.

---

## 🌱 Crear tu rama de trabajo

Cada colaborador debe trabajar en su propia rama, **no directamente en `main`**.  
Para crear una nueva rama:

```bash
git checkout -b nombre-de-tu-rama
```

🔹 Ejemplos:
```bash
git checkout -b feature-login
git checkout -b fix-conexion-db
git checkout -b mejora-interfaz
```

---

## 💻 Subir tus cambios

1. Verifica qué archivos cambiaste:
   ```bash
   git status
   ```

2. Agrega los cambios:
   ```bash
   git add .
   ```

3. Crea un commit con un mensaje descriptivo:
   ```bash
   git commit -m "Agregando módulo de registro"
   ```

4. Sube tu rama al repositorio remoto:
   ```bash
   git push origin nombre-de-tu-rama
   ```

---

## 🔄 Enviar tu trabajo (Pull Request)

1. Entra a **GitHub → Repositorio DSI → Pull Requests → New Pull Request**
2. Selecciona tu rama (`nombre-de-tu-rama`)
3. Escribe una breve descripción de tus cambios
4. Envía la solicitud
5. Espera revisión antes de hacer *merge* a `main`

---

## 🤝 Reglas básicas del equipo

- No trabajar directamente en la rama `main`
- Hacer commits claros y frecuentes
- Mantener tu rama actualizada con:
  ```bash
  git pull origin main
  ```
- Resolver conflictos antes de crear un Pull Request

---



📂 **Estructura base del proyecto**
```
DSI/
│
├── controllers/
│   └── EstudianteController.php
│
├── models/
│   └── Estudiante.php
│
├── views/
│   ├── home.php
│   └── ...
│
├── index.php
└── README.md
```

---

📢 **Nota:**  
Si la base de datos `practicas_preprofesionales` no existe, créala en tu gestor (por ejemplo, con Laragon → phpMyAdmin) antes de ejecutar el sistema.

---
# 🧩 Proyecto DSI

Repositorio del proyecto **DSI** desarrollado colaborativamente por el equipo.  
Este proyecto sigue la arquitectura **MVC en PHP** y está pensado para prácticas de desarrollo web.

---

## 🚀 Clonar el proyecto

Asegúrate de tener **Git** instalado en tu computadora.  
Luego, en tu terminal ejecuta:

```bash
git clone https://github.com/ZETAPRO24/DSI.git
cd DSI
```

Esto descargará el repositorio y te ubicará dentro del proyecto.

---

## 🌱 Crear tu rama de trabajo

Cada colaborador debe trabajar en su propia rama, **no directamente en `main`**.  
Para crear una nueva rama:

```bash
git checkout -b nombre-de-tu-rama
```

🔹 Ejemplos:
```bash
git checkout -b feature-login
git checkout -b fix-conexion-db
git checkout -b mejora-interfaz
```

---

## 💻 Subir tus cambios

1. Verifica qué archivos cambiaste:
   ```bash
   git status
   ```

2. Agrega los cambios:
   ```bash
   git add .
   ```

3. Crea un commit con un mensaje descriptivo:
   ```bash
   git commit -m "Agregando módulo de registro"
   ```

4. Sube tu rama al repositorio remoto:
   ```bash
   git push origin nombre-de-tu-rama
   ```

---

## 🔄 Enviar tu trabajo (Pull Request)

1. Entra a **GitHub → Repositorio DSI → Pull Requests → New Pull Request**
2. Selecciona tu rama (`nombre-de-tu-rama`)
3. Escribe una breve descripción de tus cambios
4. Envía la solicitud
5. Espera revisión antes de hacer *merge* a `main`

---

## 🤝 Reglas básicas del equipo

- No trabajar directamente en la rama `main`
- Hacer commits claros y frecuentes
- Mantener tu rama actualizada con:
  ```bash
  git pull origin main
  ```
- Resolver conflictos antes de crear un Pull Request

---


📂 **Estructura base del proyecto**
```
DSI/
│
├── controllers/
│   └── EstudianteController.php
│
├── models/
│   └── Estudiante.php
│
├── views/
│   ├── home.php
│   └── ...
│
├── index.php
└── README.md
```

---

📢 **Nota:**  
Si la base de datos `practicas_preprofesionales` no existe, créala en tu gestor (por ejemplo, con Laragon → phpMyAdmin) antes de ejecutar el sistema.

---
