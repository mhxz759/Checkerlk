
# Stripe Checker - Vercel Deploy

## 🚀 Deploy no Vercel

Este projeto está configurado para deploy automático no Vercel.

### Passos para fazer deploy:

1. **Instale o Vercel CLI** (opcional):
```bash
npm i -g vercel
```

2. **Faça deploy**:
```bash
vercel
```

3. **Para deploy em produção**:
```bash
vercel --prod
```

### Ou use a interface web do Vercel:

1. Acesse [vercel.com](https://vercel.com)
2. Conecte seu repositório GitHub
3. O Vercel detectará automaticamente as configurações
4. Clique em "Deploy"

## 📁 Estrutura do Projeto

```
├── index.php          # Página principal
├── api/
│   └── index.php      # API Serverless
├── assets/            # CSS, JS, imagens
├── live.mp3           # Som de aprovação
└── vercel.json        # Configuração do Vercel
```

## ⚙️ Configuração

O arquivo `vercel.json` já está configurado para:
- Rodar PHP como função serverless
- Redirecionar as rotas da API corretamente
- Servir arquivos estáticos

## 🔧 Desenvolvimento Local

Para testar localmente no Vercel:
```bash
vercel dev
```

## 📝 Observações

- A API PHP funciona como serverless function no Vercel
- O site é servido como estático (HTML/CSS/JS)
- Certifique-se de que o arquivo `live.mp3` está presente
