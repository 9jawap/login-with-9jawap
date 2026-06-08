# Log in with 9JAWAP — Official WordPress Plugin

[![License: GPL v2](https://img.shields.io/badge/License-GPL%20v2-blue.svg)](https://www.gnu.org/licenses/old-licenses/gpl-2.0.html)
[![9JAWAP Developer](https://img.shields.io/badge/9JAWAP-Developer%20Hub-emerald)](https://developers.9jawap.net)

Integrate the **9JAWAP Identity Node** directly into your WordPress ecosystem. This plugin enables seamless OAuth2 Single Sign-On (SSO), allowing millions of users to securely register and log into your external WordPress website using their 9JAWAP account credentials.

By implementing the **"Log in with 9JAWAP"** protocol, you lower registration friction, increase signup conversion rates, and instantly verify user authentication via the 9JAWAP platform network.

---

## 🚀 Key Features

* **Instant Onboarding:** One-click registration and login flow for 9JAWAP account holders.
* **Secure OAuth2 Framework:** Operates on standard secure token handshake mechanisms (`Authorization Code Grant`).
* **Profile Mapping:** Automatically synchronizes user identity fields (Username, First Name, Last Name, and Profile Picture) directly into the native WordPress user database.
* **Developer Ecosystem Integration:** Deeply linked with your centralized developer panel metrics at `9jawap.net/developers`.
* **Shortcode Support:** Custom login buttons can be placed anywhere using widgets, Gutenberg blocks, or template files.

---

## 🛠️ Prerequisites & Setup Guide

### 1. Generate Your API Keys
Before configuring the plugin, you must register your website as an active client application inside our portal:
1. Navigate to the [9JAWAP Developer Terminal](https://9jawap.net/developers).
2. Create a new Application profile.
3. Configure your **Valid Redirect URI** (This will be provided inside the plugin settings page, usually `https://yourdomain.com/wp-login.php?njw_oauth=callback`).
4. Copy your unique **Client ID** and **Client Secret**.

### 2. Installation
1. Download or clone this repository directly into your WordPress directory:
   ```bash
   cd wp-content/plugins/
   git clone [https://github.com/your-username/login-with-9jawap.git](https://github.com/9jawap/login-with-9jawap.git)
