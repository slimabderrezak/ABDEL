<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navigation Moderne</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
            min-height: 100vh;
            color: white;
        }

        .navbar {
            position: fixed;
            top: 20px;
            left: 50%;
            transform: translateX(-50%);
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 50px;
            padding: 8px;
            z-index: 1000;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .navbar:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateX(-50%) translateY(-2px);
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        }

        .nav-container {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logo {
            padding: 12px 20px;
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            text-decoration: none;
            transition: transform 0.3s ease;
        }

        .logo:hover {
            transform: scale(1.05);
        }

        .nav-menu {
            display: flex;
            list-style: none;
            gap: 4px;
            align-items: center;
        }

        .nav-item {
            position: relative;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            border-radius: 25px;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .nav-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, rgba(255, 107, 107, 0.2), rgba(78, 205, 196, 0.2));
            opacity: 0;
            transition: opacity 0.3s ease;
            border-radius: 25px;
        }

        .nav-link:hover::before {
            opacity: 1;
        }

        .nav-link:hover {
            color: white;
            transform: translateY(-1px);
        }

        .nav-link.active {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.3);
        }

        .nav-icon {
            width: 18px;
            height: 18px;
            fill: currentColor;
        }

        .dropdown {
            position: absolute;
            top: 100%;
            left: 0;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 15px;
            min-width: 200px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(-10px);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-top: 10px;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.2);
        }

        .nav-item:hover .dropdown {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .dropdown-item {
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.8);
            text-decoration: none;
            display: block;
            transition: all 0.3s ease;
            border-radius: 10px;
            margin: 5px;
        }

        .dropdown-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: none;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            padding: 12px;
            border-radius: 50%;
            transition: all 0.3s ease;
        }

        .mobile-toggle:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: rotate(90deg);
        }

        .search-container {
            position: relative;
            display: flex;
            align-items: center;
        }

        .search-input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 25px;
            padding: 10px 40px 10px 15px;
            color: white;
            font-size: 0.9rem;
            width: 200px;
            transition: all 0.3s ease;
        }

        .search-input::placeholder {
            color: rgba(255, 255, 255, 0.6);
        }

        .search-input:focus {
            outline: none;
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.4);
            width: 250px;
        }

        .search-btn {
            position: absolute;
            right: 5px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border: none;
            border-radius: 50%;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: transform 0.3s ease;
        }

        .search-btn:hover {
            transform: scale(1.1);
        }

        .content {
            padding-top: 120px;
            text-align: center;
            max-width: 800px;
            margin: 0 auto;
            padding-left: 2rem;
            padding-right: 2rem;
        }

        .content h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .content p {
            font-size: 1.2rem;
            opacity: 0.8;
            line-height: 1.6;
        }

        /* Hero Section */
        .hero {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        }

        .hero-background {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: 1;
        }

        .hero-particles {
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(2px 2px at 20px 30px, rgba(255, 255, 255, 0.1), transparent),
                              radial-gradient(2px 2px at 40px 70px, rgba(255, 255, 255, 0.1), transparent),
                              radial-gradient(1px 1px at 90px 40px, rgba(255, 255, 255, 0.1), transparent);
            background-repeat: repeat;
            background-size: 200px 200px;
            animation: float 20s infinite linear;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            text-align: center;
            max-width: 900px;
            padding: 0 2rem;
        }

        .hero-title {
            font-size: clamp(2.5rem, 5vw, 4rem);
            font-weight: 700;
            color: white;
            margin-bottom: 1.5rem;
            line-height: 1.2;
        }

        .highlight {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .hero-subtitle {
            font-size: 1.3rem;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 3rem;
            line-height: 1.6;
        }

        .hero-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn-primary, .btn-secondary, .btn-outline {
            padding: 1rem 2.5rem;
            border-radius: 50px;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(255, 107, 107, 0.4);
        }

        .btn-secondary {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 255, 255, 0.5);
            transform: translateY(-2px);
        }

        .btn-outline {
            background: transparent;
            color: white;
            border: 2px solid rgba(255, 255, 255, 0.3);
        }

        .btn-outline:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: translateY(-2px);
        }

        .scroll-indicator {
            position: absolute;
            bottom: 30px;
            left: 50%;
            transform: translateX(-50%);
            z-index: 2;
        }

        .scroll-arrow {
            width: 2px;
            height: 30px;
            background: rgba(255, 255, 255, 0.5);
            position: relative;
            animation: scrollMove 2s infinite;
        }

        .scroll-arrow::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: -3px;
            width: 8px;
            height: 8px;
            border-right: 2px solid rgba(255, 255, 255, 0.5);
            border-bottom: 2px solid rgba(255, 255, 255, 0.5);
            transform: rotate(45deg);
        }

        @keyframes scrollMove {
            0%, 100% { opacity: 0; transform: translateY(-10px); }
            50% { opacity: 1; transform: translateY(0); }
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 2rem;
        }

        /* Section Header */
        .section-header {
            text-align: center;
            margin-bottom: 4rem;
        }

        .section-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .section-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            max-width: 600px;
            margin: 0 auto;
        }

        /* Services Section */
        .services {
            padding: 6rem 0;
            background: linear-gradient(135deg, #2a5298 0%, #1e3c72 100%);
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 2rem;
        }

        .service-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2.5rem;
            text-align: center;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
        }

        .service-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            color: white;
        }

        .service-icon svg {
            width: 40px;
            height: 40px;
        }

        .service-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: white;
            margin-bottom: 1rem;
        }

        .service-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        .service-link {
            color: #4ecdc4;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.3s ease;
        }

        .service-link:hover {
            color: #ff6b6b;
        }

        /* Portfolio Section */
        .portfolio {
            padding: 6rem 0;
            background: linear-gradient(135deg, #1e3c72 0%, #0f3460 100%);
        }

        .portfolio-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 2rem;
        }

        .portfolio-item {
            border-radius: 20px;
            overflow: hidden;
            position: relative;
            height: 300px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            transition: transform 0.3s ease;
        }

        .portfolio-item:hover {
            transform: scale(1.05);
        }

        .portfolio-image {
            width: 100%;
            height: 100%;
            position: relative;
            background: linear-gradient(135deg, rgba(255, 107, 107, 0.8), rgba(78, 205, 196, 0.8));
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .portfolio-overlay {
            text-align: center;
            color: white;
            padding: 2rem;
        }

        .portfolio-overlay h4 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .portfolio-overlay p {
            margin-bottom: 1.5rem;
            opacity: 0.9;
        }

        .portfolio-btn {
            background: rgba(255, 255, 255, 0.2);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 25px;
            text-decoration: none;
            transition: all 0.3s ease;
        }

        .portfolio-btn:hover {
            background: rgba(255, 255, 255, 0.3);
            transform: translateY(-2px);
        }

        /* About Section */
        .about {
            padding: 6rem 0;
            background: linear-gradient(135deg, #0f3460 0%, #1a1a2e 100%);
        }

        .about-content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 4rem;
            align-items: center;
        }

        .about-description {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            line-height: 1.8;
            margin-bottom: 3rem;
        }

        .stats {
            display: flex;
            gap: 3rem;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        .about-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 20px;
            padding: 2rem;
        }

        .team-member {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .team-member:last-child {
            margin-bottom: 0;
        }

        .member-avatar {
            width: 60px;
            height: 60px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: 600;
            font-size: 1.2rem;
        }

        .member-info h4 {
            color: white;
            margin-bottom: 0.25rem;
        }

        .member-info p {
            color: rgba(255, 255, 255, 0.7);
            font-size: 0.9rem;
        }

        /* CTA Section */
        .cta {
            padding: 6rem 0;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
        }

        .cta-content {
            text-align: center;
        }

        .cta-title {
            font-size: 2.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 1rem;
        }

        .cta-subtitle {
            font-size: 1.2rem;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 3rem;
        }

        .cta-buttons {
            display: flex;
            gap: 1.5rem;
            justify-content: center;
            flex-wrap: wrap;
        }

        @media (max-width: 768px) {
            .navbar {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                transform: none;
                border-radius: 0;
                padding: 15px 20px;
            }

            .nav-container {
                justify-content: space-between;
            }

            .nav-menu {
                position: fixed;
                top: 80px;
                left: 0;
                width: 100%;
                background: rgba(0, 0, 0, 0.95);
                backdrop-filter: blur(20px);
                flex-direction: column;
                padding: 20px;
                gap: 10px;
                transform: translateY(-100vh);
                transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            }

            .nav-menu.active {
                transform: translateY(0);
            }

            .mobile-toggle {
                display: block;
            }

            .search-container {
                display: none;
            }

            .content {
                padding-top: 150px;
            }

            .content h1 {
                font-size: 2rem;
            }

            .dropdown {
                position: static;
                opacity: 1;
                visibility: visible;
                transform: none;
                margin-top: 10px;
                background: rgba(255, 255, 255, 0.05);
            }
        }

        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background: #ff4757;
            color: white;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            font-size: 0.7rem;
            display: flex;
            align-items: center;
            justify-content: center;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            margin-top: 80px;
            position: relative;
            overflow: hidden;
        }

        .footer::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, #ff6b6b, #4ecdc4, #45b7d1, #96ceb4);
            background-size: 200% 200%;
            animation: gradientMove 3s ease infinite;
        }

        @keyframes gradientMove {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .footer-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 60px 20px 0;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr 1.5fr;
            gap: 40px;
            margin-bottom: 40px;
        }

        .footer-section {
            color: rgba(255, 255, 255, 0.9);
        }

        .footer-logo {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .logo-icon {
            font-size: 2rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .footer-description {
            color: rgba(255, 255, 255, 0.7);
            line-height: 1.6;
            margin-bottom: 30px;
        }

        .social-links {
            display: flex;
            gap: 15px;
        }

        .social-link {
            width: 45px;
            height: 45px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: rgba(255, 255, 255, 0.7);
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .social-link:hover {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            color: white;
            transform: translateY(-3px);
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.3);
        }

        .social-link svg {
            width: 20px;
            height: 20px;
        }

        .footer-title {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: white;
            position: relative;
        }

        .footer-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border-radius: 2px;
        }

        .footer-links {
            list-style: none;
        }

        .footer-links li {
            margin-bottom: 12px;
        }

        .footer-link {
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            transition: all 0.3s ease;
            display: inline-block;
            position: relative;
        }

        .footer-link::before {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 0;
            height: 1px;
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            transition: width 0.3s ease;
        }

        .footer-link:hover {
            color: white;
            transform: translateX(5px);
        }

        .footer-link:hover::before {
            width: 100%;
        }

        .newsletter-section {
            background: rgba(255, 255, 255, 0.05);
            padding: 30px;
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .newsletter-description {
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 25px;
            line-height: 1.5;
        }

        .newsletter-form {
            margin-bottom: 25px;
        }

        .input-group {
            display: flex;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            overflow: hidden;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
        }

        .input-group:focus-within {
            border-color: rgba(255, 107, 107, 0.5);
            box-shadow: 0 0 20px rgba(255, 107, 107, 0.2);
        }

        .newsletter-input {
            flex: 1;
            background: none;
            border: none;
            padding: 15px;
            color: white;
            font-size: 0.95rem;
        }

        .newsletter-input::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .newsletter-input:focus {
            outline: none;
        }

        .newsletter-btn {
            background: linear-gradient(45deg, #ff6b6b, #4ecdc4);
            border: none;
            padding: 15px 20px;
            color: white;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .newsletter-btn:hover {
            background: linear-gradient(45deg, #ff5252, #26c6da);
            transform: scale(1.05);
        }

        .contact-info {
            space-y: 15px;
        }

        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
            color: rgba(255, 255, 255, 0.7);
            margin-bottom: 15px;
        }

        .contact-icon {
            width: 18px;
            height: 18px;
            opacity: 0.8;
        }

        .footer-bottom {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
        }

        .footer-bottom-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
        }

        .copyright {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .footer-bottom-links {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .footer-bottom-link {
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            font-size: 0.9rem;
            transition: color 0.3s ease;
        }

        .footer-bottom-link:hover {
            color: white;
        }

        .separator {
            color: rgba(255, 255, 255, 0.3);
        }

        @media (max-width: 1024px) {
            .footer-content {
                grid-template-columns: 1fr 1fr 1fr;
                gap: 30px;
            }
            
            .newsletter-section {
                grid-column: span 3;
            }
        }

        @media (max-width: 768px) {
            .footer-content {
                grid-template-columns: 1fr;
                gap: 40px;
            }
            
            .newsletter-section {
                grid-column: span 1;
            }
            
            .footer-bottom-content {
                flex-direction: column;
                text-align: center;
            }
            
            .footer-bottom-links {
                flex-wrap: wrap;
                justify-content: center;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="nav-container">
            <a href="#" class="logo">✨ Brand</a>
            
            <ul class="nav-menu" id="navMenu">
                <li class="nav-item">
                    <a href="#" class="nav-link active">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                            <polyline points="9,22 9,12 15,12 15,22"/>
                        </svg>
                        Accueil
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <rect x="2" y="3" width="20" height="14" rx="2" ry="2"/>
                            <line x1="8" y1="21" x2="16" y2="21"/>
                            <line x1="12" y1="17" x2="12" y2="21"/>
                        </svg>
                        Services
                    </a>
                    <div class="dropdown">
                        <a href="#" class="dropdown-item">Développement Web</a>
                        <a href="#" class="dropdown-item">Design UI/UX</a>
                        <a href="#" class="dropdown-item">Marketing Digital</a>
                        <a href="#" class="dropdown-item">Consulting</a>
                    </div>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                            <circle cx="9" cy="9" r="2"/>
                            <path d="M21 15l-3.086-3.086a2 2 0 0 0-2.828 0L6 21"/>
                        </svg>
                        Portfolio
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        À propos
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <svg class="nav-icon" viewBox="0 0 24 24">
                            <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                            <polyline points="22,6 12,13 2,6"/>
                        </svg>
                        Contact
                        <span class="notification-badge">3</span>
                    </a>
                </li>
            </ul>

            <div class="search-container">
                <input type="text" class="search-input" placeholder="Rechercher...">
                <button class="search-btn">
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="white">
                        <circle cx="11" cy="11" r="8"/>
                        <path d="M21 21l-4.35-4.35"/>
                    </svg>
                </button>
            </div>
            
            <button class="mobile-toggle" id="mobileToggle">☰</button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero">
        <div class="hero-background">
            <div class="hero-particles"></div>
        </div>
        <div class="hero-content">
            <h1 class="hero-title">Créons ensemble votre <span class="highlight">avenir numérique</span></h1>
            <p class="hero-subtitle">Des solutions web innovantes qui transforment vos idées en expériences digitales exceptionnelles</p>
            <div class="hero-buttons">
                <a href="#services" class="btn-primary">Découvrir nos services</a>
                <a href="#portfolio" class="btn-secondary">Voir notre travail</a>
            </div>
        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="services">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nos Services</h2>
                <p class="section-subtitle">Des solutions complètes pour tous vos besoins digitaux</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M3 3h18v18H3V3zm16 16V5H5v14h14zM11 7h2v2h-2V7zm0 4h2v6h-2v-6z"/>
                        </svg>
                    </div>
                    <h3 class="service-title">Développement Web</h3>
                    <p class="service-description">Sites web modernes et performants avec les dernières technologies React, Vue.js et Node.js.</p>
                    <a href="#" class="service-link">En savoir plus →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/>
                        </svg>
                    </div>
                    <h3 class="service-title">Design UI/UX</h3>
                    <p class="service-description">Interfaces utilisateur intuitives et expériences utilisateur optimisées pour maximiser l'engagement.</p>
                    <a href="#" class="service-link">En savoir plus →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M7 18c-1.1 0-2-.9-2-2V8c0-1.1.9-2 2-2h10c1.1 0 2 .9 2 2v8c0 1.1-.9 2-2 2H7zm0-2h10V8H7v8z"/>
                        </svg>
                    </div>
                    <h3 class="service-title">E-commerce</h3>
                    <p class="service-description">Boutiques en ligne complètes avec paiement sécurisé et gestion avancée des stocks.</p>
                    <a href="#" class="service-link">En savoir plus →</a>
                </div>
                <div class="service-card">
                    <div class="service-icon">
                        <svg viewBox="0 0 24 24" fill="currentColor">
                            <path d="M17 1.01L7 1c-1.1 0-2 .9-2 2v18c0 1.1.9 2 2 2h10c1.1 0 2-.9 2-2V3c0-1.1-.9-1.99-2-1.99zM17 19H7V5h10v14z"/>
                        </svg>
                    </div>
                    <h3 class="service-title">Applications Mobile</h3>
                    <p class="service-description">Apps natives et cross-platform pour iOS et Android avec une performance optimale.</p>
                    <a href="#" class="service-link">En savoir plus →</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Nos Réalisations</h2>
                <p class="section-subtitle">Découvrez nos projets les plus récents</p>
            </div>
            <div class="portfolio-grid">
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <div class="portfolio-overlay">
                            <h4>E-commerce Fashion</h4>
                            <p>Boutique en ligne moderne</p>
                            <a href="#" class="portfolio-btn">Voir le projet</a>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <div class="portfolio-overlay">
                            <h4>Application Fintech</h4>
                            <p>Interface mobile intuitive</p>
                            <a href="#" class="portfolio-btn">Voir le projet</a>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <div class="portfolio-overlay">
                            <h4>Dashboard Analytics</h4>
                            <p>Tableau de bord interactif</p>
                            <a href="#" class="portfolio-btn">Voir le projet</a>
                        </div>
                    </div>
                </div>
                <div class="portfolio-item">
                    <div class="portfolio-image">
                        <div class="portfolio-overlay">
                            <h4>Site Corporate</h4>
                            <p>Identité visuelle moderne</p>
                            <a href="#" class="portfolio-btn">Voir le projet</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about">
        <div class="container">
            <div class="about-content">
                <div class="about-text">
                    <h2 class="section-title">À Propos de Nous</h2>
                    <p class="about-description">
                        Nous sommes une équipe passionnée de développeurs, designers et stratèges digitaux. 
                        Depuis plus de 5 ans, nous accompagnons les entreprises dans leur transformation numérique 
                        en créant des solutions web innovantes et performantes.
                    </p>
                    <div class="stats">
                        <div class="stat-item">
                            <h3 class="stat-number">150+</h3>
                            <p class="stat-label">Projets réalisés</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number">98%</h3>
                            <p class="stat-label">Clients satisfaits</p>
                        </div>
                        <div class="stat-item">
                            <h3 class="stat-number">5+</h3>
                            <p class="stat-label">Années d'expérience</p>
                        </div>
                    </div>
                </div>
                <div class="about-image">
                    <div class="about-card">
                        <div class="team-member">
                            <div class="member-avatar">JD</div>
                            <div class="member-info">
                                <h4>John Doe</h4>
                                <p>CEO & Founder</p>
                            </div>
                        </div>
                        <div class="team-member">
                            <div class="member-avatar">SA</div>
                            <div class="member-info">
                                <h4>Sarah Adams</h4>
                                <p>Lead Designer</p>
                            </div>
                        </div>
                        <div class="team-member">
                            <div class="member-avatar">MB</div>
                            <div class="member-info">
                                <h4>Mike Brown</h4>
                                <p>Tech Lead</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à démarrer votre projet ?</h2>
                <p class="cta-subtitle">Contactez-nous dès aujourd'hui pour une consultation gratuite</p>
                <div class="cta-buttons">
                    <a href="#contact" class="btn-primary">Commencer maintenant</a>
                    <a href="#" class="btn-outline">Planifier un appel</a>
                </div>
            </div>
        </div>
    </section>

    <footer class="footer">
        <div class="footer-container">
            <div class="footer-content">
                <div class="footer-section">
                    <div class="footer-logo">
                        <span class="logo-icon">✨</span>
                        <span class="logo-text">Brand</span>
                    </div>
                    <p class="footer-description">
                        Nous créons des expériences numériques exceptionnelles qui transforment vos idées en réalité. 
                        Innovation, créativité et excellence technique.
                    </p>
                    <div class="social-links">
                        <a href="#" class="social-link" aria-label="Facebook">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Twitter">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="LinkedIn">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                            </svg>
                        </a>
                        <a href="#" class="social-link" aria-label="Instagram">
                            <svg viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Services</h3>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Développement Web</a></li>
                        <li><a href="#" class="footer-link">Design UI/UX</a></li>
                        <li><a href="#" class="footer-link">E-commerce</a></li>
                        <li><a href="#" class="footer-link">Applications Mobile</a></li>
                        <li><a href="#" class="footer-link">Consulting IT</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Entreprise</h3>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">À propos</a></li>
                        <li><a href="#" class="footer-link">Notre équipe</a></li>
                        <li><a href="#" class="footer-link">Carrières</a></li>
                        <li><a href="#" class="footer-link">Blog</a></li>
                        <li><a href="#" class="footer-link">Actualités</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h3 class="footer-title">Support</h3>
                    <ul class="footer-links">
                        <li><a href="#" class="footer-link">Centre d'aide</a></li>
                        <li><a href="#" class="footer-link">Contact</a></li>
                        <li><a href="#" class="footer-link">Documentation</a></li>
                        <li><a href="#" class="footer-link">FAQ</a></li>
                        <li><a href="#" class="footer-link">Status</a></li>
                    </ul>
                </div>

                <div class="footer-section newsletter-section">
                    <h3 class="footer-title">Newsletter</h3>
                    <p class="newsletter-description">
                        Restez informé de nos dernières nouveautés et offres exclusives.
                    </p>
                    <form class="newsletter-form">
                        <div class="input-group">
                            <input type="email" placeholder="Votre email" class="newsletter-input" required>
                            <button type="submit" class="newsletter-btn">
                                <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/>
                                </svg>
                            </button>
                        </div>
                    </form>
                    <div class="contact-info">
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/>
                            </svg>
                            <span>contact@brand.com</span>
                        </div>
                        <div class="contact-item">
                            <svg class="contact-icon" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                            </svg>
                            <span>+33 1 23 45 67 89</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="footer-bottom">
                <div class="footer-bottom-content">
                    <p class="copyright">
                        © 2025 Brand. Tous droits réservés.
                    </p>
                    <div class="footer-bottom-links">
                        <a href="#" class="footer-bottom-link">Politique de confidentialité</a>
                        <span class="separator">•</span>
                        <a href="#" class="footer-bottom-link">Conditions d'utilisation</a>
                        <span class="separator">•</span>
                        <a href="#" class="footer-bottom-link">Cookies</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Menu mobile
        const mobileToggle = document.getElementById('mobileToggle');
        const navMenu = document.getElementById('navMenu');

        mobileToggle.addEventListener('click', () => {
            navMenu.classList.toggle('active');
            mobileToggle.innerHTML = navMenu.classList.contains('active') ? '✕' : '☰';
        });

        // Gestion des liens actifs
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                
                // Retirer la classe active de tous les liens
                document.querySelectorAll('.nav-link').forEach(l => l.classList.remove('active'));
                
                // Ajouter la classe active au lien cliqué
                link.classList.add('active');
                
                // Fermer le menu mobile si ouvert
                navMenu.classList.remove('active');
                mobileToggle.innerHTML = '☰';
            });
        });

        // Effet de scroll pour la navbar
        let lastScrollY = window.scrollY;
        window.addEventListener('scroll', () => {
            const navbar = document.querySelector('.navbar');
            
            if (window.innerWidth > 768) {
                if (window.scrollY > lastScrollY && window.scrollY > 100) {
                    navbar.style.transform = 'translateX(-50%) translateY(-100px)';
                } else {
                    navbar.style.transform = 'translateX(-50%) translateY(0)';
                }
            }
            
            lastScrollY = window.scrollY;
        });

        // Animation de la barre de recherche
        const searchInput = document.querySelector('.search-input');
        const searchBtn = document.querySelector('.search-btn');

        searchBtn.addEventListener('click', () => {
            if (searchInput.value.trim()) {
                alert(`Recherche: ${searchInput.value}`);
            } else {
                searchInput.focus();
            }
        });

        searchInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter' && searchInput.value.trim()) {
                alert(`Recherche: ${searchInput.value}`);
            }
        });

        // Effet de particules au survol des liens
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('mouseenter', () => {
                link.style.boxShadow = '0 4px 20px rgba(255, 107, 107, 0.3)';
            });
            
            link.addEventListener('mouseleave', () => {
                if (!link.classList.contains('active')) {
                    link.style.boxShadow = 'none';
                }
            });
        });

        // Newsletter form
        const newsletterForm = document.querySelector('.newsletter-form');
        const newsletterInput = document.querySelector('.newsletter-input');

        newsletterForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const email = newsletterInput.value.trim();
            
            if (email && email.includes('@')) {
                // Animation de succès
                const btn = document.querySelector('.newsletter-btn');
                const originalContent = btn.innerHTML;
                
                btn.innerHTML = '✓';
                btn.style.background = '#4CAF50';
                
                setTimeout(() => {
                    btn.innerHTML = originalContent;
                    btn.style.background = 'linear-gradient(45deg, #ff6b6b, #4ecdc4)';
                    newsletterInput.value = '';
                }, 2000);
                
                alert(`Merci ! Vous êtes maintenant abonné avec l'email : ${email}`);
            } else {
                alert('Veuillez entrer une adresse email valide.');
            }
        });

        // Animation d'apparition du footer au scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const footerObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.animation = 'fadeInUp 0.8s ease forwards';
                }
            });
        }, observerOptions);

        document.querySelectorAll('.footer-section').forEach(section => {
            footerObserver.observe(section);
        });
    </script>
</body>
</html>
