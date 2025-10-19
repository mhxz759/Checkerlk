
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="https://cdn.brandfetch.io/stripe.com/w/400/h/400/theme/dark/icon.jpeg?c=1dxbfHSJFAPEGdCLU4o5B">
  <title>Stripe Checker | Astro Center</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
  <link href="assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="assets/css/style.css?v=2.0.0" rel="stylesheet" />
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Inter', sans-serif;
      background: linear-gradient(135deg, #e8eef5 0%, #f5f7fa 50%, #dfe6ed 100%);
      min-height: 100vh;
      padding: 20px;
      color: #2c3e50;
    }

    .container {
      max-width: 1400px;
      margin: 0 auto;
    }

    .header {
      text-align: center;
      margin-bottom: 30px;
      padding: 20px;
      background: #ffffff;
      border-radius: 20px;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      border: 1px solid rgba(102, 126, 234, 0.2);
    }

    .header h1 {
      font-size: 2.5rem;
      font-weight: 700;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-bottom: 10px;
    }

    .header .logo {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      box-shadow: 0 8px 20px rgba(102, 126, 234, 0.4);
    }

    .grid {
      display: grid;
      grid-template-columns: 1fr 400px;
      gap: 20px;
      margin-bottom: 20px;
    }

    @media (max-width: 1024px) {
      .grid {
        grid-template-columns: 1fr;
      }
    }

    .card {
      background: #ffffff;
      border-radius: 20px;
      padding: 25px;
      border: 1px solid rgba(102, 126, 234, 0.15);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
      transition: all 0.3s ease;
    }

    .card:hover {
      border-color: rgba(102, 126, 234, 0.4);
      box-shadow: 0 8px 25px rgba(102, 126, 234, 0.15);
    }

    .card-title {
      font-size: 1.2rem;
      font-weight: 600;
      margin-bottom: 20px;
      color: #2c3e50;
      display: flex;
      align-items: center;
      gap: 10px;
    }

    .card-title i {
      color: #667eea;
    }

    textarea {
      width: 100%;
      min-height: 300px;
      background: #f8f9fa;
      border: 2px solid #e1e8ed;
      border-radius: 15px;
      padding: 20px;
      color: #2c3e50;
      font-family: 'Courier New', monospace;
      font-size: 14px;
      resize: vertical;
      transition: all 0.3s ease;
    }

    textarea:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 15px rgba(102, 126, 234, 0.2);
      background: #fff;
    }

    textarea::placeholder {
      color: rgba(44, 62, 80, 0.4);
    }

    .button-group {
      display: flex;
      gap: 10px;
      flex-wrap: wrap;
      margin-top: 20px;
    }

    .btn {
      padding: 12px 24px;
      border: none;
      border-radius: 12px;
      font-weight: 600;
      font-size: 14px;
      cursor: pointer;
      transition: all 0.3s ease;
      display: flex;
      align-items: center;
      gap: 8px;
      flex: 1;
      justify-content: center;
      min-width: 120px;
    }

    .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.3);
    }

    .btn:disabled {
      opacity: 0.5;
      cursor: not-allowed;
      transform: none;
    }

    .btn-primary {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
    }

    .btn-success {
      background: linear-gradient(135deg, #00f2c3 0%, #00b894 100%);
      color: #fff;
    }

    .btn-danger {
      background: linear-gradient(135deg, #fd5d93 0%, #ec250d 100%);
      color: #fff;
    }

    .btn-stop {
      background: linear-gradient(135deg, #ff8d72 0%, #ff6491 100%);
      color: #fff;
    }

    .stat-card {
      background: #f8f9fa;
      border-radius: 12px;
      padding: 15px;
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
      border: 1px solid #e1e8ed;
    }

    .stat-label {
      font-size: 14px;
      font-weight: 500;
      color: #5a6c7d;
    }

    .stat-value {
      font-size: 24px;
      font-weight: 700;
      padding: 8px 16px;
      border-radius: 8px;
      min-width: 60px;
      text-align: center;
    }

    .stat-success {
      background: linear-gradient(135deg, #00f2c3 0%, #00b894 100%);
      color: #fff;
    }

    .stat-danger {
      background: linear-gradient(135deg, #fd5d93 0%, #ec250d 100%);
      color: #fff;
    }

    .stat-info {
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: #fff;
    }

    .select-wrapper {
      position: relative;
      margin-bottom: 20px;
    }

    select {
      width: 100%;
      padding: 15px;
      background: #f8f9fa;
      border: 2px solid #e1e8ed;
      border-radius: 12px;
      color: #2c3e50;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      transition: all 0.3s ease;
      appearance: none;
    }

    select:focus {
      outline: none;
      border-color: #667eea;
      box-shadow: 0 0 15px rgba(102, 126, 234, 0.2);
      background: #fff;
    }

    .select-wrapper::after {
      content: '▼';
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #667eea;
      pointer-events: none;
    }

    .progress-section {
      margin-top: 20px;
    }

    .progress-label {
      font-size: 14px;
      font-weight: 500;
      margin-bottom: 10px;
      color: rgba(255, 255, 255, 0.7);
    }

    .progress {
      height: 12px;
      background: #e1e8ed;
      border-radius: 10px;
      overflow: hidden;
      border: 1px solid #d0d9e0;
    }

    .progress-bar {
      height: 100%;
      background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
      transition: width 0.3s ease;
      box-shadow: 0 0 8px rgba(102, 126, 234, 0.3);
    }

    .results-section {
      display: grid;
      grid-template-columns: 1fr 1fr 1fr;
      gap: 20px;
    }

    @media (max-width: 1024px) {
      .results-section {
        grid-template-columns: 1fr;
      }
    }

    .results-card {
      background: #ffffff;
      border-radius: 20px;
      padding: 20px;
      border: 1px solid rgba(102, 126, 234, 0.15);
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
    }

    .results-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 15px;
      padding-bottom: 15px;
      border-bottom: 2px solid #f0f3f7;
    }

    .results-title {
      font-size: 16px;
      font-weight: 600;
      display: flex;
      align-items: center;
      gap: 8px;
    }

    .toggle-btn {
      background: #f0f3f7;
      border: 1px solid #e1e8ed;
      padding: 8px 12px;
      border-radius: 8px;
      color: #5a6c7d;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .toggle-btn:hover {
      background: #e1e8ed;
      color: #2c3e50;
    }

    .results-content {
      max-height: 400px;
      overflow-y: auto;
      padding: 10px;
      font-family: 'Courier New', monospace;
      font-size: 13px;
      line-height: 1.8;
      word-break: break-word;
      color: #2c3e50;
    }

    .results-content::-webkit-scrollbar {
      width: 8px;
    }

    .results-content::-webkit-scrollbar-track {
      background: #f0f3f7;
      border-radius: 10px;
    }

    .results-content::-webkit-scrollbar-thumb {
      background: rgba(102, 126, 234, 0.4);
      border-radius: 10px;
    }

    .results-content::-webkit-scrollbar-thumb:hover {
      background: rgba(102, 126, 234, 0.6);
    }

    .back-btn {
      background: #ffffff;
      border: 1px solid #e1e8ed;
      padding: 10px 20px;
      border-radius: 12px;
      color: #667eea;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      gap: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
      margin-bottom: 20px;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }

    .back-btn:hover {
      background: #667eea;
      color: #fff;
      transform: translateX(-5px);
    }

    .stat-warning {
      background: linear-gradient(135deg, #ff8d72 0%, #ff6491 100%);
      color: #fff;
    }

    .theme-toggle {
      position: fixed;
      top: 20px;
      right: 20px;
      width: 50px;
      height: 50px;
      border-radius: 50%;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      border: none;
      color: #fff;
      font-size: 20px;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
      transition: all 0.3s ease;
      z-index: 1000;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .theme-toggle:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(102, 126, 234, 0.6);
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
      color: #e1e8ed;
    }

    body.dark-mode .header {
      background: #1e2742;
      border-color: rgba(102, 126, 234, 0.3);
    }

    body.dark-mode .card {
      background: #1e2742;
      border-color: rgba(102, 126, 234, 0.3);
    }

    body.dark-mode .card-title {
      color: #e1e8ed;
    }

    body.dark-mode textarea {
      background: #2a3353;
      border-color: #3d4a6e;
      color: #e1e8ed;
    }

    body.dark-mode textarea:focus {
      background: #2a3353;
      border-color: #667eea;
    }

    body.dark-mode textarea::placeholder {
      color: rgba(225, 232, 237, 0.4);
    }

    body.dark-mode .stat-card {
      background: #2a3353;
      border-color: #3d4a6e;
    }

    body.dark-mode .stat-label {
      color: #a8b7c7;
    }

    body.dark-mode select {
      background: #2a3353;
      border-color: #3d4a6e;
      color: #e1e8ed;
    }

    body.dark-mode select:focus {
      background: #2a3353;
      border-color: #667eea;
    }

    body.dark-mode .progress {
      background: #2a3353;
      border-color: #3d4a6e;
    }

    body.dark-mode .results-card {
      background: #1e2742;
      border-color: rgba(102, 126, 234, 0.3);
    }

    body.dark-mode .results-header {
      border-bottom-color: #3d4a6e;
    }

    body.dark-mode .results-title {
      color: #e1e8ed;
    }

    body.dark-mode .toggle-btn {
      background: #2a3353;
      border-color: #3d4a6e;
      color: #a8b7c7;
    }

    body.dark-mode .toggle-btn:hover {
      background: #3d4a6e;
      color: #e1e8ed;
    }

    body.dark-mode .results-content {
      color: #e1e8ed;
    }

    body.dark-mode .results-content::-webkit-scrollbar-track {
      background: #2a3353;
    }

    body.dark-mode .back-btn {
      background: #1e2742;
      border-color: #3d4a6e;
      color: #667eea;
    }

    body.dark-mode .back-btn:hover {
      background: #667eea;
      color: #fff;
    }
  </style>
</head>
<body>
  <audio id="aprovadaSound">
    <source src="live.mp3" type="audio/mp3">
  </audio>
  
  <div class="container">
    <a href="/" class="back-btn">
      <i class="fa fa-arrow-left"></i> Voltar
    </a>

    <button class="theme-toggle" id="themeToggle">
      <i class="fa fa-moon"></i>
    </button>

    <div class="header">
      <img src="https://cdn.brandfetch.io/stripe.com/w/400/h/400/theme/dark/icon.jpeg?c=1dxbfHSJFAPEGdCLU4o5B" alt="Stripe" class="logo">
      <h1>STRIPE CHECKER</h1>
      <p style="color: rgba(255, 255, 255, 0.6); font-size: 14px;">Teste seus cartões de forma rápida e segura</p>
    </div>

    <div class="grid">
      <!-- Card Principal -->
      <div class="card">
        <div class="card-title">
          <i class="fa fa-credit-card"></i>
          Lista de Cartões
        </div>
        
        <textarea id="lista_ccs" placeholder="Cole suas CCs aqui no formato: CARD|MES|ANO|CVV&#10;&#10;Exemplo:&#10;4242424242424242|12|2025|123&#10;5555555555554444|10|2026|456"></textarea>
        
        <div class="button-group">
          <button class="btn btn-primary" id="iniciarchk">
            <i class="fa fa-play"></i> INICIAR
          </button>
          <button class="btn btn-stop" id="pararchk" disabled>
            <i class="fa fa-stop"></i> PARAR
          </button>
          <button class="btn btn-success btn-copy">
            <i class="fa fa-clipboard"></i> Copiar
          </button>
          <button class="btn btn-danger btn-trash">
            <i class="fa fa-trash"></i> Limpar
          </button>
        </div>
      </div>

      <!-- Card de Estatísticas -->
      <div class="card">
        <div class="card-title">
          <i class="fa fa-chart-bar"></i>
          Estatísticas
        </div>

        <div class="stat-card">
          <span class="stat-label">Aprovadas</span>
          <span class="stat-value stat-success" id="lives_ccs">0</span>
        </div>

        <div class="stat-card">
          <span class="stat-label">Reprovadas</span>
          <span class="stat-value stat-danger" id="dies_ccs">0</span>
        </div>

        <div class="stat-card">
          <span class="stat-label">Testadas</span>
          <span class="stat-value stat-info" id="testado_ccs">0</span>
        </div>

        <div class="stat-card">
          <span class="stat-label">Unknown</span>
          <span class="stat-value stat-warning" id="unknown_ccs">0</span>
        </div>

        <div class="stat-card">
          <span class="stat-label">Total Carregadas</span>
          <span class="stat-value stat-info" id="total_ccs">0</span>
        </div>

        <div class="select-wrapper">
          <select id="SelectOptions">
            <option selected disabled>SELECIONE A API</option>
            <option value="gates/api">[API] STRIPE CHECKER</option>
          </select>
        </div>

        <div class="progress-section">
          <div class="progress-label">Progresso do Teste</div>
          <div class="progress">
            <div id="progresstest" class="progress-bar" style="width: 0%"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Resultados -->
    <div class="results-section">
      <div class="results-card">
        <div class="results-header">
          <div class="results-title">
            <i class="fa fa-check-circle" style="color: #00f2c3;"></i>
            APROVADAS
          </div>
          <button class="toggle-btn show-lives" type="show">
            <i class="fa fa-eye-slash"></i>
          </button>
        </div>
        <div id="aprovadas" class="results-content"></div>
      </div>

      <div class="results-card">
        <div class="results-header">
          <div class="results-title">
            <i class="fa fa-times-circle" style="color: #fd5d93;"></i>
            REPROVADAS
          </div>
          <button class="toggle-btn show-dies" type="hidden">
            <i class="fa fa-eye"></i>
          </button>
        </div>
        <div id="reprovadas" class="results-content" style="display: none;"></div>
      </div>

      <div class="results-card">
        <div class="results-header">
          <div class="results-title">
            <i class="fa fa-question-circle" style="color: #ff8d72;"></i>
            UNKNOWN
          </div>
          <button class="toggle-btn show-unknown" type="hidden">
            <i class="fa fa-eye"></i>
          </button>
        </div>
        <div id="unknown" class="results-content" style="display: none;"></div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      // Theme Toggle
      const themeToggle = document.getElementById('themeToggle');
      const body = document.body;
      const themeIcon = themeToggle.querySelector('i');

      // Load saved theme
      const savedTheme = localStorage.getItem('theme');
      if (savedTheme === 'dark') {
        body.classList.add('dark-mode');
        themeIcon.classList.remove('fa-moon');
        themeIcon.classList.add('fa-sun');
      }

      themeToggle.addEventListener('click', () => {
        body.classList.toggle('dark-mode');
        
        if (body.classList.contains('dark-mode')) {
          themeIcon.classList.remove('fa-moon');
          themeIcon.classList.add('fa-sun');
          localStorage.setItem('theme', 'dark');
          Swal.fire({
            title: 'Tema Escuro Ativado 🌙',
            icon: 'success',
            showConfirmButton: false,
            background: '#1e2742',
            toast: true,
            position: 'top-end',
            timer: 2000
          });
        } else {
          themeIcon.classList.remove('fa-sun');
          themeIcon.classList.add('fa-moon');
          localStorage.setItem('theme', 'light');
          Swal.fire({
            title: 'Tema Claro Ativado ☀️',
            icon: 'success',
            showConfirmButton: false,
            background: '#ffffff',
            toast: true,
            position: 'top-end',
            timer: 2000
          });
        }
      });

      var delay = 3000; // Delay de 3 segundos entre requisições para evitar erros

      $('.show-lives').click(function() {
        var type = $('.show-lives').attr('type');
        $('#aprovadas').slideToggle();
        if (type == 'show') {
          $('.show-lives').html('<i class="fa fa-eye"></i>');
          $('.show-lives').attr('type', 'hidden');
        } else {
          $('.show-lives').html('<i class="fa fa-eye-slash"></i>');
          $('.show-lives').attr('type', 'show');
        }
      });

      $('.show-dies').click(function() {
        var type = $('.show-dies').attr('type');
        $('#reprovadas').slideToggle();
        if (type == 'show') {
          $('.show-dies').html('<i class="fa fa-eye"></i>');
          $('.show-dies').attr('type', 'hidden');
        } else {
          $('.show-dies').html('<i class="fa fa-eye-slash"></i>');
          $('.show-dies').attr('type', 'show');
        }
      });

      $('.show-unknown').click(function() {
        var type = $('.show-unknown').attr('type');
        $('#unknown').slideToggle();
        if (type == 'show') {
          $('.show-unknown').html('<i class="fa fa-eye"></i>');
          $('.show-unknown').attr('type', 'hidden');
        } else {
          $('.show-unknown').html('<i class="fa fa-eye-slash"></i>');
          $('.show-unknown').attr('type', 'show');
        }
      });

      $('.btn-trash').click(function() {
        Swal.fire({
          title: 'Reprovadas limpas!',
          icon: 'success',
          showConfirmButton: false,
          background: '#ffffff',
          color: '#2c3e50',
          toast: true,
          position: 'top-end',
          timer: 3000
        });
        $('#reprovadas').text('');
      });

      $('.btn-copy').click(function() {
        var aprovadas = document.getElementById('aprovadas').innerText;
        if (!aprovadas) {
          Swal.fire({
            title: 'Nenhuma aprovada para copiar!',
            icon: 'warning',
            showConfirmButton: false,
            background: '#ffffff',
            color: '#2c3e50',
            toast: true,
            position: 'top-end',
            timer: 3000
          });
          return;
        }
        var textarea = document.createElement("textarea");
        textarea.value = aprovadas;
        document.body.appendChild(textarea);
        textarea.select();
        document.execCommand('copy');
        document.body.removeChild(textarea);
        Swal.fire({
          title: 'Aprovadas copiadas!',
          icon: 'success',
          showConfirmButton: false,
          background: '#ffffff',
          color: '#2c3e50',
          toast: true,
          position: 'top-end',
          timer: 3000
        });
      });

      $('#iniciarchk').attr('disabled', null);
      $('#iniciarchk').click(function () {
        if (!$('#lista_ccs').val().trim()) {
          Swal.fire({
            title: 'Lista vazia!',
            text: 'Por favor, insira cartões para testar',
            icon: 'error',
            showConfirmButton: false,
            background: '#ffffff',
            color: '#2c3e50',
            toast: true,
            position: 'top-end',
            timer: 3000
          });
          return false;
        } else if (!$('#SelectOptions').val()) {
          Swal.fire({
            title: 'Selecione uma API!',
            icon: 'warning',
            showConfirmButton: false,
            background: '#ffffff',
            color: '#2c3e50',
            toast: true,
            position: 'top-end',
            timer: 3000
          });
          return false;
        } else {
          var line = $('#lista_ccs').val().replace(',', ' ').split('\n');
          line = line.filter(function (item, index, inputArray) {
            return inputArray.indexOf(item) == index;
          });

          var total = line.length;
          var ap = 0;
          var rp = 0;
          var uk = 0;
          var timeoutCount = 0;
          var testador = $("#SelectOptions option:selected").val();

          if(total > 4000){
            Swal.fire({
              title: 'Limite excedido!', 
              text: 'Máximo de 4000 linhas',
              icon: 'warning', 
              showConfirmButton: false,
              background: '#ffffff',
              color: '#2c3e50',
              toast: true, 
              position: 'top-end', 
              timer: 3000
            });
            return false;
          }

          $('#total_ccs').html(total);
          $("#lista_ccs").val(line.join("\n"));
          $('#lista_ccs').attr('disabled', 'disabled');
          $('#SelectOptions').attr('disabled', 'disabled');

          var currentIndex = 0;
          
          function processNextCard() {
            if (currentIndex >= line.length) {
              $('#iniciarchk').attr('disabled', null);
              $('#pararchk').attr('disabled', 'disabled');
              $('#lista_ccs').attr('disabled', null);
              $('#SelectOptions').attr('disabled', null);
              Swal.fire({
                title: 'Teste finalizado!',
                icon: 'success',
                showConfirmButton: false,
                background: body.classList.contains('dark-mode') ? '#1e2742' : '#ffffff',
                toast: true,
                position: 'top-end',
                timer: 3000
              });
              return;
            }

            var value = line[currentIndex];
            currentIndex++;

            if (value == '\n' || !value) {
              setTimeout(processNextCard, delay);
              return;
            }

            var ajaxCall = $.ajax({
              url: testador + '.php?lista=' + value,
              type: 'GET',
              beforeSend: function () {
                $('#pararchk').attr('disabled', null);
                $('#iniciarchk').attr('disabled', 'disabled');
                $('#SelectOptions').attr('disabled', 'disabled');
              },
              success: function (data) {
                if (data.match('Terminou ou cancelou')) {
                  reteste(value);
                  return;
                }
                if (data.match('URL: []')) {
                  reteste(value);
                  return;
                }
                if (data.match('RETESTAR')) {
                  reteste(value);
                  return;
                }

                if (data.indexOf("Live") >= 0) {
                  $("#aprovadas").val(data + "\n" + $("#aprovadas").val());
                  ap = ap + 1;
                  document.getElementById("aprovadaSound").play();
                  Swal.fire({
                    title: '+1 Aprovada!',
                    icon: 'success',
                    background: body.classList.contains('dark-mode') ? '#1e2742' : '#ffffff',
                    customClass: {
                      popup: body.classList.contains('dark-mode') ? 'swal-dark' : ''
                    },
                    showConfirmButton: false,
                    toast:true,
                    position: 'top-end',
                    timer: 3000
                  });
                  document.getElementById("aprovadas").innerHTML += data + "<p>";
                  removelinha();
                } else if (data.indexOf("Unknown") >= 0) {
                  $("#unknown").val(data + "\n" + $("#unknown").val());
                  uk = uk + 1;
                  document.getElementById("unknown").innerHTML += data + "<p>";
                  
                  // Contar timeouts
                  if (data.indexOf("Timeout") >= 0) {
                    timeoutCount++;
                    if (timeoutCount >= 3) {
                      Swal.fire({
                        title: 'Atenção!',
                        text: 'Muitos timeouts detectados. A API pode estar lenta ou fora do ar.',
                        icon: 'warning',
                        showConfirmButton: true,
                        background: body.classList.contains('dark-mode') ? '#1e2742' : '#ffffff'
                      });
                      timeoutCount = 0; // Reset contador
                    }
                  }
                  
                  removelinha();
                } else {
                  $("#reprovadas").val(data + "\n" + $("#reprovadas").val());
                  rp = rp + 1;
                  document.getElementById("reprovadas").innerHTML += data + "<p>";
                  removelinha();
                }

                var fila = parseInt(ap) + parseInt(rp) + parseInt(uk);
                $('#lives_ccs').html(ap);
                $('#dies_ccs').html(rp);
                $('#unknown_ccs').html(uk);
                $('#testado_ccs').html(fila);

                porcentagem(total, fila);

                // Processar próximo cartão após delay
                setTimeout(processNextCard, delay);
              }
            });

            $('#pararchk').off('click').on('click', function () {
              ajaxCall.abort();
              currentIndex = line.length; // Para o loop
              $('#iniciarchk').attr('disabled', null);
              $('#pararchk').attr('disabled', 'disabled');
              $('#lista_ccs').attr('disabled', null);
              $('#SelectOptions').attr('disabled', null);
              Swal.fire({
                title: 'Teste pausado!',
                icon: 'info',
                showConfirmButton: false,
                background: body.classList.contains('dark-mode') ? '#1e2742' : '#ffffff',
                toast: true,
                position: 'top-end',
                timer: 3000
              });
            });
          }
          
          // Iniciar processamento do primeiro cartão
          processNextCard();
        }
      });
    });

    function limpar() {
      document.getElementById("lista_ccs").value = "";
    }

    function porcentagem(total, pctm) {
      var porcentagem = (pctm / total) * 100 + "%";
      var el = document.getElementById("progresstest");
      el.style.width = porcentagem;
    }

    function removelinha() {
      var lines = $("#lista_ccs").val().split('\n');
      lines.splice(0, 1);
      $("#lista_ccs").val(lines.join("\n"));
    }
  </script>
</body>
</html>
