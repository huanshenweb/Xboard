<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$title}}</title>
    
    @php ($colors = [
        'purple' => '#8B5CF6',
        'blue' => '#3B82F6',
        'green' => '#10B981',
        'orange' => '#F59E0B',
        'pink' => '#EC4899'
    ])
    <meta name="theme-color" content="{{$colors[$theme_config['theme_color']] ?? '#8B5CF6'}}">
    
    <link rel="stylesheet" href="/theme/{{$theme}}/assets/theme/{{$theme_config['theme_color'] ?? 'purple'}}.css?v={{$version}}">
    <link rel="stylesheet" href="/theme/{{$theme}}/assets/main.css?v={{$version}}">
    @if (file_exists(public_path("/theme/{$theme}/assets/custom.css")))
        <link rel="stylesheet" href="/theme/{{$theme}}/assets/custom.css?v={{$version}}">
    @endif
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <script>
        window.settings = {
            title: '{{$title}}',
            assets_path: '/theme/{{$theme}}/assets',
            theme: {
                color: '{{$theme_config['theme_color'] ?? 'purple'}}',
                download_style: '{{$theme_config['download_style'] ?? 'gradient'}}',
                download_size: '{{$theme_config['download_size'] ?? 'large'}}',
                navbar_style: '{{$theme_config['navbar_style'] ?? 'blur'}}',
                enable_animations: {{$theme_config['enable_animations'] ?? 'true'}}
            },
            version: '{{$version}}',
            background_url: '{{$theme_config['background_url'] ?? ''}}',
            description: '{{$description}}',
            logo: '{{$logo}}'
        }
    </script>
    
    <style>
        {!! $theme_config['custom_css'] ?? '' !!}
    </style>
</head>
<body class="modern-ui-theme" data-theme="{{$theme_config['theme_color'] ?? 'purple'}}" data-animations="{{$theme_config['enable_animations'] ?? 'true'}}">
    
    <!-- Navigation Bar -->
    <nav class="navbar navbar-{{$theme_config['navbar_style'] ?? 'blur'}}">
        <div class="container">
            <div class="navbar-brand">
                @if($logo)
                    <img src="{{$logo}}" alt="{{$title}}" class="logo">
                @else
                    <span class="brand-text">{{$title}}</span>
                @endif
            </div>
            <div class="navbar-menu">
                <a href="#home" class="nav-link active">首页</a>
                <a href="#features" class="nav-link">功能</a>
                <a href="#pricing" class="nav-link">价格</a>
                <a href="#download" class="nav-link">下载</a>
                <a href="#support" class="nav-link">支持</a>
            </div>
            <div class="navbar-actions">
                <a href="/login" class="btn btn-outline">登录</a>
                <a href="/register" class="btn btn-primary">注册</a>
            </div>
            <button class="mobile-menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="hero-section" id="home">
        <div class="hero-background">
            @if($theme_config['background_url'] ?? '')
                <img src="{{$theme_config['background_url']}}" alt="Background" class="hero-bg-image">
            @endif
            <div class="hero-overlay"></div>
        </div>
        <div class="container">
            <div class="hero-content">
                <h1 class="hero-title animate-fade-in-up">
                    <span class="gradient-text">{{$title}}</span>
                </h1>
                <p class="hero-subtitle animate-fade-in-up animation-delay-1">
                    {{$description ?? '安全、快速、稳定的网络加速服务'}}
                </p>
                
                <!-- Prominent Download Section -->
                <div class="download-hero-section animate-fade-in-up animation-delay-2">
                    <a href="#download" class="btn-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}} btn-download-{{$theme_config['download_size'] ?? 'large'}}">
                        <i class="fas fa-download"></i>
                        <span>立即下载</span>
                        <small>支持所有主流平台</small>
                    </a>
                </div>
                
                <div class="hero-stats animate-fade-in-up animation-delay-3">
                    <div class="stat-item">
                        <div class="stat-number">10K+</div>
                        <div class="stat-label">活跃用户</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">99.9%</div>
                        <div class="stat-label">在线率</div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100+</div>
                        <div class="stat-label">节点数量</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features-section" id="features">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">核心功能</h2>
                <p class="section-subtitle">为您提供最优质的服务体验</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3 class="feature-title">极速连接</h3>
                    <p class="feature-description">优化的线路，保证您的网络速度</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">安全加密</h3>
                    <p class="feature-description">军事级别加密，保护您的隐私安全</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-globe"></i>
                    </div>
                    <h3 class="feature-title">全球节点</h3>
                    <p class="feature-description">遍布全球的高速节点供您选择</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3 class="feature-title">多平台支持</h3>
                    <p class="feature-description">支持Windows、Mac、iOS、Android</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3 class="feature-title">7x24支持</h3>
                    <p class="feature-description">专业客服团队随时为您服务</p>
                </div>
                
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-infinity"></i>
                    </div>
                    <h3 class="feature-title">无限流量</h3>
                    <p class="feature-description">不限速、不限流，畅享网络自由</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Download Section - Most Prominent -->
    <section class="download-section" id="download">
        <div class="download-bg-decoration"></div>
        <div class="container">
            <div class="section-header">
                <h2 class="section-title gradient-text">开始使用</h2>
                <p class="section-subtitle">选择适合您设备的客户端下载</p>
            </div>
            
            <div class="download-cards-grid">
                <div class="download-card">
                    <div class="download-card-header">
                        <i class="fab fa-windows"></i>
                        <h3>Windows</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">Windows 7/8/10/11</p>
                        <ul class="client-list">
                            <li>Clash for Windows</li>
                            <li>V2RayN</li>
                            <li>Clash Verge</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 下载
                        </a>
                    </div>
                </div>
                
                <div class="download-card featured">
                    <div class="featured-badge">推荐</div>
                    <div class="download-card-header">
                        <i class="fab fa-apple"></i>
                        <h3>macOS</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">macOS 10.13+</p>
                        <ul class="client-list">
                            <li>ClashX</li>
                            <li>ClashX Pro</li>
                            <li>V2RayU</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 下载
                        </a>
                    </div>
                </div>
                
                <div class="download-card">
                    <div class="download-card-header">
                        <i class="fab fa-android"></i>
                        <h3>Android</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">Android 5.0+</p>
                        <ul class="client-list">
                            <li>Clash for Android</li>
                            <li>SagerNet</li>
                            <li>V2RayNG</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 下载
                        </a>
                    </div>
                </div>
                
                <div class="download-card">
                    <div class="download-card-header">
                        <i class="fab fa-app-store-ios"></i>
                        <h3>iOS</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">iOS 12.0+</p>
                        <ul class="client-list">
                            <li>Shadowrocket</li>
                            <li>Quantumult X</li>
                            <li>Surge</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 下载
                        </a>
                    </div>
                </div>
                
                <div class="download-card">
                    <div class="download-card-header">
                        <i class="fab fa-linux"></i>
                        <h3>Linux</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">Ubuntu/Debian/CentOS</p>
                        <ul class="client-list">
                            <li>Clash</li>
                            <li>V2Ray</li>
                            <li>Qv2ray</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 下载
                        </a>
                    </div>
                </div>
                
                <div class="download-card">
                    <div class="download-card-header">
                        <i class="fas fa-tv"></i>
                        <h3>其他设备</h3>
                    </div>
                    <div class="download-card-body">
                        <p class="platform-info">路由器/电视盒子</p>
                        <ul class="client-list">
                            <li>OpenWrt</li>
                            <li>Android TV</li>
                            <li>Apple TV</li>
                        </ul>
                    </div>
                    <div class="download-card-footer">
                        <a href="#" class="btn-platform-download btn-download-{{$theme_config['download_style'] ?? 'gradient'}}">
                            <i class="fas fa-download"></i> 查看教程
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Quick Download CTA -->
            <div class="quick-download-cta">
                <div class="cta-content">
                    <h3>不确定选择哪个？</h3>
                    <p>我们会自动检测您的设备并推荐最适合的客户端</p>
                </div>
                <a href="#" class="btn-auto-detect btn-download-{{$theme_config['download_style'] ?? 'gradient'}} btn-download-large">
                    <i class="fas fa-magic"></i>
                    <span>智能检测下载</span>
                </a>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section class="pricing-section" id="pricing">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">选择您的套餐</h2>
                <p class="section-subtitle">灵活的价格方案，满足不同需求</p>
            </div>
            
            <div class="pricing-grid">
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">基础版</h3>
                        <div class="plan-price">
                            <span class="currency">¥</span>
                            <span class="amount">19</span>
                            <span class="period">/月</span>
                        </div>
                    </div>
                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> 100GB 流量/月</li>
                        <li><i class="fas fa-check"></i> 10+ 节点</li>
                        <li><i class="fas fa-check"></i> 标准速度</li>
                        <li><i class="fas fa-check"></i> 1个设备同时在线</li>
                    </ul>
                    <a href="#" class="btn-plan">选择套餐</a>
                </div>
                
                <div class="pricing-card featured">
                    <div class="popular-badge">最受欢迎</div>
                    <div class="pricing-header">
                        <h3 class="plan-name">专业版</h3>
                        <div class="plan-price">
                            <span class="currency">¥</span>
                            <span class="amount">39</span>
                            <span class="period">/月</span>
                        </div>
                    </div>
                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> 500GB 流量/月</li>
                        <li><i class="fas fa-check"></i> 50+ 节点</li>
                        <li><i class="fas fa-check"></i> 高速连接</li>
                        <li><i class="fas fa-check"></i> 3个设备同时在线</li>
                        <li><i class="fas fa-check"></i> 优先客服支持</li>
                    </ul>
                    <a href="#" class="btn-plan">选择套餐</a>
                </div>
                
                <div class="pricing-card">
                    <div class="pricing-header">
                        <h3 class="plan-name">旗舰版</h3>
                        <div class="plan-price">
                            <span class="currency">¥</span>
                            <span class="amount">79</span>
                            <span class="period">/月</span>
                        </div>
                    </div>
                    <ul class="plan-features">
                        <li><i class="fas fa-check"></i> 无限流量</li>
                        <li><i class="fas fa-check"></i> 100+ 节点</li>
                        <li><i class="fas fa-check"></i> 极速连接</li>
                        <li><i class="fas fa-check"></i> 10个设备同时在线</li>
                        <li><i class="fas fa-check"></i> 专属客服</li>
                        <li><i class="fas fa-check"></i> 独享IP可选</li>
                    </ul>
                    <a href="#" class="btn-plan">选择套餐</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>关于我们</h4>
                    <p>提供专业的网络加速服务</p>
                </div>
                <div class="footer-section">
                    <h4>快速链接</h4>
                    <ul>
                        <li><a href="#features">功能介绍</a></li>
                        <li><a href="#pricing">价格方案</a></li>
                        <li><a href="#download">下载中心</a></li>
                        <li><a href="#support">帮助支持</a></li>
                    </ul>
                </div>
                <div class="footer-section">
                    <h4>联系我们</h4>
                    <ul>
                        <li><i class="fas fa-envelope"></i> support@example.com</li>
                        <li><i class="fab fa-telegram"></i> @telegram</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 {{$title}}. All rights reserved.</p>
            </div>
        </div>
    </footer>

    {!! $theme_config['custom_html'] ?? '' !!}
    
    <script src="/theme/{{$theme}}/assets/main.js?v={{$version}}"></script>
    @if (file_exists(public_path("/theme/{$theme}/assets/custom.js")))
        <script src="/theme/{{$theme}}/assets/custom.js?v={{$version}}"></script>
    @endif
</body>
</html>
