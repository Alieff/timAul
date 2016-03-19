/**
 *
 * @author Aulia Chairunisa
 */
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;



public class DBConnect {
    
    public Connection con;
    public Statement stmt;
    public ResultSet rs;
    
    public DBConnect() throws ClassNotFoundException, SQLException{
        
        Class.forName("com.mysql.jdbc.Driver");
        
        con = DriverManager.getConnection("jdbc:mysql://localhost:3306/inspirecrawler_db", "root", "");
        stmt = con.createStatement();    
        
    }   
    
    public void putData(Quote fullQuote) throws SQLException{
        /*
         * ini pake kelas yang Puti bikin
         */
        String quote = fullQuote.getQuote();
        String author = fullQuote.getAuthor();
        String category = fullQuote.getCategory();
        String source = fullQuote.getSource();
        Boolean isManual = fullQuote.isManual();
        String language = fullQuote.getLanguage();
        
        
        PreparedStatement putToTable = con.prepareStatement("INSERT INTO quote (quote, isManual, language, author, category, source) VALUES ('"+quote+"', '"+isManual+"', '"+language+"', '"+author+"', '"+category+"', '"+source+"')");
        putToTable.executeUpdate();
        System.out.println("Insert completed");
    }
    
    
    
    
    public void getData() throws SQLException{
        String query = "select * from quote";
        rs = stmt.executeQuery(query);
        System.out.println("Records from Database");
        
        while(rs.next()){
            int id_col = rs.getInt("id");
            String quote = rs.getString("quote");
            String isManual = rs.getString("isManual");
            String language = rs.getString("language");
            String author = rs.getString("author");
            String category = rs.getString("category");
            String source = rs.getString("source");

            System.out.println( id_col + " | " + quote + " | " + isManual + " | " + language + " | " + category + " | " + author + " | " + source);            
        }
        
        
    }
    
    
}
