package actividadanalisiss2;

import java.sql.*;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.Statement;

public class Db {

    Connection con;

    public Db() {
        try {
            Class.forName("com.mysql.cj.jdbc.Driver");
            con = DriverManager.getConnection("jdbc:mysql://localhost:3306/library", "root", "");
            if (con != null) {
                System.out.println("Conexion establecida");
            }
        } catch (Exception e) {
            System.out.println("error " + e);
        }
    }

    public void obtenerDatos() {
        Statement st;
        ResultSet rs;

        try {
            st = con.createStatement();
            rs = st.executeQuery("SELECT * FROM Client");
            while (rs.next()) {
                String name=rs.getString("Name");
                System.out.println("Name: "+name);
                String SurName=rs.getString("SurName");
                System.out.println("SurName: "+SurName);
            }

            //con.close();
        } catch (Exception e) {
        }
    }
    public void actualizarNombreAlumno(int ID_Client, String name){
    PreparedStatement st;
    try{
    st=con.prepareStatement("UPDATE client SET name=? WHERE ID_Client=?");
    st.setString(1,name);
    st.setInt(2,ID_Client);
    st.executeUpdate();
    } catch ( SQLException ex) {
        //Logger.getLogger(Db.class.getName()).log(Level.SEVERE, null, ex);
    }   
    }
}
