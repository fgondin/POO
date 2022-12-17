class Animal{
    public String getNome(){
        return "getNome da classe Animal";
    }

    public String testar(){
        return "Testando";
    }
}

Cachorro cachorro = new Animal {
    public void getNome(){
        this.testar();
    }
}

Cachorro cachorro = new Cachorro();
cachorro.getNome();