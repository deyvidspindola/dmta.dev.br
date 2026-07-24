#!/usr/bin/env bash
#
# Sincroniza CSS e JS de public/ → public_html/
# Uso na HostGator (SSH/Terminal):
#   cd ~/app/dmta.dev.br
#   bash scripts/sync-public-assets.sh
#
set -euo pipefail

SRC="/home1/deyvid87/app/dmta.dev.br/public"
DEST="/home1/deyvid87/dmta.dev.br"

if [[ ! -d "$SRC" ]]; then
  echo "Erro: pasta de origem não encontrada: $SRC" >&2
  exit 1
fi

if [[ ! -d "$DEST" ]]; then
  echo "Erro: pasta de destino não encontrada: $DEST" >&2
  exit 1
fi

echo "Origem : $SRC"
echo "Destino: $DEST"
echo "Copiando apenas .css e .js (estrutura de pastas preservada)..."

# Copia só arquivos .css e .js, mantendo diretórios (css/, js/, build/assets/, etc.)
if command -v rsync >/dev/null 2>&1; then
  rsync -av \
    --include='*/' \
    --include='*.css' \
    --include='*.js' \
    --exclude='*' \
    "$SRC/" "$DEST/"
else
  # Fallback sem rsync (find + cp)
  find "$SRC" -type f \( -name '*.css' -o -name '*.js' \) -print0 |
  while IFS= read -r -d '' file; do
    rel="${file#"$SRC"/}"
    target="$DEST/$rel"
    mkdir -p "$(dirname "$target")"
    cp -f "$file" "$target"
    echo "  $rel"
  done
fi

# Vite/Laravel precisa do manifest.json (não é css/js, mas é obrigatório pro Admin V2)
if [[ -f "$SRC/build/manifest.json" ]]; then
  mkdir -p "$DEST/build"
  cp -f "$SRC/build/manifest.json" "$DEST/build/manifest.json"
  echo "  build/manifest.json (necessário pro @vite)"
fi

echo "Concluído."
