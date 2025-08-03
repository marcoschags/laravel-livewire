# criar Branch de desenvolvimento
current_branch=$(git rev-parse --abbrev-ref HEAD)

if [[ $current_branch == "dev_"* ]]; then
    echo "Você já está em um branch de desenvolvimento. Não será criado um novo branch."
else
    echo "Nome do Novo Branch:"
    read nome_branch

    # Verifica se o branch já existe
    if git show-ref --verify --quiet refs/heads/dev_$nome_branch; then
        echo "O branch 'dev_$nome_branch' já existe. Nenhuma ação será realizada."
    else
        git checkout -b dev_$nome_branch &&
        git add .
        git commit -m "Criação do Branch dev_$nome_branch" &&
        git push -u origin dev_$nome_branch
        echo "Branch 'dev_$nome_branch' criado e enviado ao repositório remoto."
    fi
fi


