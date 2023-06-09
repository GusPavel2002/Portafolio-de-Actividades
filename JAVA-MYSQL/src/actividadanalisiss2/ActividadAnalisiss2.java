package actividadanalisiss2;
/*
 * @author Gustavo Pavel Hernández Solís
 */
public class ActividadAnalisiss2 {

    
    public static void main(String[] args) {
        Db db = new Db();
        db.obtenerDatos();
        db.actualizarNombreAlumno(1, "Pedro");
    }
    
}
