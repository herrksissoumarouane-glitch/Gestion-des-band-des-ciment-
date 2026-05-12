
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

Jede Rolle hat spezifische Permissions.

---

## ⚙️ Hauptfunktionen

### 📊 Dashboard
- Übersicht über alle wichtigen Daten
- Statistiken und Visualisierungen (Charts)

### 🏢 Administration
- Benutzer- und Systemverwaltung
- Kontrolle der gesamten Anwendung

### 🧾 Rechnungen (Facture)
- Erstellung und Verwaltung von Rechnungen
- Übersicht über finanzielle Transaktionen

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
- 📊 Charts für Datenanalyse
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

```
app/              → Backend Logik (Controller, Models)
bootstrap/        → Laravel Bootstrap
config/           → Konfiguration
database/         → Migrationen & Seeder
public/           → Entry Point (index.php)
resources/        → Frontend Views
routes/           → Web Routes
storage/          → Dateien & Cache
tests/            → Tests


---

## 🚀 Installation & Setup

### 📥 1. Repository klonen
```bash id="clonecement"
git clone https://github.com/herrksissoumarouane-glitch/Gestion-des-band-des-ciment-.git
cd Gestion-des-band-des-ciment-
````

---

### 📦 2. Abhängigkeiten installieren

```bash id="installcement"
composer install
npm install
```

---

### ⚙️ 3. Umgebung konfigurieren

* `.env` Datei erstellen (oder `.env.example` kopieren)
* Datenbank konfigurieren (MySQL)
* APP_KEY generieren:

```bash id="keycement"
php artisan key:generate
```

---

### 🗄️ 4. Datenbank Migrationen

```bash id="migratecement"
php artisan migrate
```

(Optional: Seeder falls vorhanden)

```bash
php artisan db:seed
```

---

### ▶️ 5. Projekt starten

```bash id="servecement"
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
