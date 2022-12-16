public abstract class Livro {
    private String nome;
    private String descricao;
    private double valor;
    private String isbn;
    private Autor autor;

    public Livro(Autor autor){
        this.autor = autor;
        this.isbn = "000-00-00000-00-0";
    }

    public boolean aplicaDesconto(double porcentagem){
        return false;
    }
}

public class LivroFisico extends Livro {
    public LivroFisico(Autor autor){
        return this getValor()*0.05;
    }
}