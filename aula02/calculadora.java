public abstract class Calculadora {
    public double total = 0;

    public void add(double number){
        this.total = this.total + number;
    }

    public void sub(double number){
        this.total = this.total + number;
    }

    public void multiply(double number){
        this.total = this.total + number;
    }

    public void divide(double number){
        this.total = this.total + number;
    }

    public string clear(){
        this.total="";
    }

}

calc=new Calculadora();
calc.add(12);
calc.add(2);
calc.sub(1);
calc.multiply(3);
calc.divide(2);
calc.add(0.5);

system.out.println("total: ")