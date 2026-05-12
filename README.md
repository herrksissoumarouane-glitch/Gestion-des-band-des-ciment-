 
# 🏗️ Gestion des Bandes de Ciment

## 📌 Projektbeschreibung
Dieses Projekt ist ein webbasiertes Management-System zur Verwaltung von Zementbändern und zur Unterstützung von Geschäftsprozessen in einem Unternehmen.

Es wurde im Rahmen eines **Stage-Projekts** entwickelt und dient zur Digitalisierung der Verwaltung von Kunden, Verkäufen, Rechnungen und Zementbeständen.

---

## 👥 Benutzerrollen
Das System basiert auf einem Rollen- und Berechtigungssystem:

- **Admin** → Vollzugriff auf das gesamte System  
- **Controller** → Verwaltung von Daten und Prozessen  
- **Chef** → Überwachung und Kontrolle der Aktivitäten  

Jede Rolle besitzt spezifische Berechtigungen (Permissions).

---

## ⚙️ Hauptfunktionen

### 📊 Dashboard
- Übersicht aller wichtigen Daten
- Statistiken und Charts

### 🏢 Administration
- Benutzer- und Systemverwaltung
- Kontrolle der gesamten Anwendung

### 🧾 Rechnungen (Facture)
- Erstellung und Verwaltung von Rechnungen
- Übersicht der finanziellen Transaktionen

### 💰 Verkaufsverwaltung
- Verwaltung aller Verkäufe
- Nachverfolgung von Transaktionen

### 🏗️ Zement (Ciment)
- Verwaltung von Zementprodukten
- Lager- und Bestandskontrolle

### 👤 Kundenverwaltung
- Verwaltung von Kundendaten
- Verbindung zwischen Kunden und Verkäufen

---

## 🔐 Authentifizierung
- Login- und Registrierungs-System
- Rollenbasierte Zugriffskontrolle
- Geschützte Bereiche für autorisierte Benutzer

---

## 📈 Besondere Features
- 📊 Datenanalyse mit Charts
- 🔍 Filter-System für schnelle Suche
- 📁 Strukturierte Datenverwaltung
- ⚡ Schnelle Navigation

---

## 🧱 Verwendete Technologien
- Laravel (PHP Framework)
- MySQL
- HTML, CSS, JavaScript
- Bootstrap
- Vite
- Tailwind CSS

---

## 📂 Projektstruktur

```txt id="cementstructurefinal"
app/            → Backend Logik (Controller, Models)
bootstrap/      → Laravel Bootstrap
config/         → Konfiguration
database/       → Migrationen & Seeder
public/         → Entry Point (index.php)
resources/      → Frontend Views
routes/         → Web Routes
storage/        → Dateien & Cache
tests/          → Tests
``` id="structfinal2"

---

## 🚀 Installation & Setup

### 📥 Repository klonen
```bash id="clonefinal"
git clone https://github.com/herrksissoumarouane-glitch/Gestion-des-band-des-ciment-.git
cd Gestion-des-band-des-ciment-
````

---

### 📦 Abhängigkeiten installieren

```bash id="installfinal"
composer install
npm install
```

---

### ⚙️ Umgebung konfigurieren

* `.env` Datei erstellen oder kopieren von `.env.example`
* Datenbank (MySQL) konfigurieren
* Application Key generieren:

```bash id="keyfinal"
php artisan key:generate
```

---

### 🗄️ Datenbank Migrationen

```bash id="migratefinal"
php artisan migrate
```

(Optional)

```bash id="seedfinal"
php artisan db:seed
```

---

### ▶️ Projekt starten

```bash id="servefinal"
php artisan serve
npm run dev
```

---

## 🎯 Ziel des Projekts

Das Ziel dieses Projekts ist die Entwicklung eines realistischen Management-Systems zur Digitalisierung von Geschäftsprozessen in einem Unternehmen, insbesondere im Bereich Zementhandel.

---

## 👨‍💻 Entwickler

Projekt erstellt von: herrksissoumarouane-glitch

```

---
