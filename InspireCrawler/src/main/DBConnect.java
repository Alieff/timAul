/**
 * @author Aulia Chairunisa
 */
import com.mongodb.BasicDBObject;
import com.mongodb.DB;
import com.mongodb.DBCollection;
import com.mongodb.MongoClient;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
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

    public DBConnect() {
        
        //Class.forName("com.mysql.jdbc.Driver");
        
        //con = DriverManager.getConnection("jdbc:mysql://localhost:3306/inspirecrawler_db", "root", "");
        //stmt = con.createStatement();

    }   
    
    public void putData(Quote fullQuote) {

        DB dB = (new MongoClient("localhost", 27017)).getDB("test");
        DBCollection dBCollection = dB.getCollection("Restaurants");
        BasicDBObject basicDBObject = new BasicDBObject();
        basicDBObject.put("quote", fullQuote.getQuote());
        basicDBObject.put("author", fullQuote.getAuthor());
        basicDBObject.put("category", fullQuote.getCategory());
        basicDBObject.put("language", fullQuote.getLanguage());
        basicDBObject.put("source", fullQuote.getSource());
        basicDBObject.put("isManual", fullQuote.isManual());
        dBCollection.insert(basicDBObject);
        
    }
    
    
    
    
    public void getData() {
       /* String query = "select * from quote";
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
        
        */
    }
    
    
}
