package main; /**
 *
 * @author Aulia Chairunisa
 */
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.Statement;

public class Database {
    
    public Connection con;
    public Statement stmt;
    public ResultSet rs;

    public Database() {
        
        //Class.forName("com.mysql.jdbc.Driver");
        
        //con = DriverManager.getConnection("jdbc:mysql://localhost:3306/inspirecrawler_db", "root", "");
        //stmt = con.createStatement();

    }   
    
    public void putData(Quote fullQuote) {

        PrintWriter pw;
        try {
            File file = new File("../DatabaseTemporary.csv");
            if (!file.exists()) {
                file.createNewFile();
            }
            FileWriter fw = new FileWriter(file, true);
            BufferedWriter bw = new BufferedWriter(fw);
            pw = new PrintWriter(bw);

            String quote = fullQuote.getQuote();
            String author = fullQuote.getAuthor();
            String category = fullQuote.getCategory();
            String source = fullQuote.getSource();
            Boolean isManual = fullQuote.isManual();
            String language = fullQuote.getLanguage();
            //System.out.println(quote +","+author + "," + source + "," + category + "," + isManual + "," + language);
            pw.println(quote +";"+author + ";" + source + ";" + category + ";" + isManual + ";" + language);
            pw.close();
            //  PreparedStatement putToTable = con.prepareStatement("INSERT INTO quote (quote, isManual, language, author, category, source) VALUES ('"+quote+"', '"+isManual+"', '"+language+"', '"+author+"', '"+category+"', '"+source+"')");
            //  putToTable.executeUpdate();
            //   System.out.println("Insert completed");
        }
        catch (Exception e){

        }

    }
    
    
    

    
    
}
