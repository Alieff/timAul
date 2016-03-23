import java.io.*;
import java.util.*;
import org.json.simple.JSONArray;
import org.json.simple.JSONObject;
import org.json.simple.parser.JSONParser;	
import java.util.regex.Matcher;
import java.util.regex.Pattern;

import edu.stanford.nlp.dcoref.CorefChain;
import edu.stanford.nlp.dcoref.CorefCoreAnnotations;
import edu.stanford.nlp.io.*;
import edu.stanford.nlp.ling.*;
import edu.stanford.nlp.pipeline.*;
import edu.stanford.nlp.semgraph.SemanticGraph;
import edu.stanford.nlp.semgraph.SemanticGraphCoreAnnotations;
import edu.stanford.nlp.sentiment.SentimentCoreAnnotations;
import edu.stanford.nlp.trees.*;
import edu.stanford.nlp.util.*;

public class SentenceIdentifier{

	String tempFilename = "lele.txt";
	PrintWriter out;
	PrintWriter toFile;
	// Writer w ;
	Properties props;
	StanfordCoreNLP pipeline;

	public SentenceIdentifier(){
	   File statText = new File("lala2.txt");
	   try{
		   // FileOutputStream is = new FileOutputStream(statText);
		   // OutputStreamWriter osw = new OutputStreamWriter(is);    
		   // this.w = new BufferedWriter(osw);
	       this.out = new PrintWriter(System.out);
	       this.toFile = new PrintWriter(tempFilename,"UTF-8");
	   }catch(Exception e){
	   		System.out.println("IO Error");
	   }
       this.props =  new Properties();
       loadModels();
       this.pipeline = new StanfordCoreNLP(props);
	}

	public static void main(String[] args)throws Exception{
		SentenceIdentifier sen = new SentenceIdentifier();
		String result = sen.identify("Kosgi Santosh sent an email to Stanford University. He didn't get a reply. - Alief");
		System.out.println(result);
	}


	public String identify(String sentences){

		String result = "";
	    Annotation annotation = new Annotation(sentences);
	    // run all the selected Annotators on this text
	    pipeline.annotate(annotation);
		try{
		    pipeline.jsonPrint(annotation,toFile);
		 	JSONParser parser = new JSONParser();
		    Object obj = parser.parse(new FileReader(tempFilename));
		 	
		    JSONObject jsonObject = (JSONObject) obj;

		     JSONArray companyList = (JSONArray) jsonObject.get("sentences");
	         Iterator<JSONObject> iterator = companyList.iterator();
	        while (iterator.hasNext()) {
	            String parseTree = (String) iterator.next().get("parse");
				// System.out.println(parseTree);
				String np = extractTree(parseTree,"NP");
				String vp = extractTree(parseTree,"VP");
				String nn = extractTree(parseTree,"NN");
				// w.write(np);
	   //      	w.write(vp);
	   //      	w.write(nn);
	   //      	w.write("\n");
	        	result+= np+vp+nn+"\n";
	        }
	        // w.close();
		}catch(Exception e){
			System.out.println("Error");
			System.out.println(e.getMessage());
		}
		return result;
	}



	private void loadModels(){

	    // Add in sentiment
	    this.props.put("annotators", "tokenize, ssplit, pos, lemma, ner, parse, dcoref, sentiment");
	}


	private static String extractTree(String pool, String head){
		int firstIndex = pool.indexOf("("+head);
		int paranthesesCount = 0;
		int lastIndex = 0;
		String result = "";
		int recordState = 0; 
		// kalau ketemu "(" state jadi 1, record off
		// kalau ketemu " " state jadi 3, ready to record
		// kalau ketemu ")" jadi 1, record off
		// dari 3 kalau ketemu selain "(" atau ")" jadi 2, record on
		if(firstIndex<0){
			return head+" not found ";
		}
		for(int ii = firstIndex ; ii<pool.length() ; ii++){
			char currentChar = pool.charAt(ii);
			
//			System.out.println(currentChar+" "+recordState+" "+result);
//			System.out.println(recordState);
			if(currentChar=='(' ){
				paranthesesCount++;
				recordState = 1;
			}else if(currentChar==' '){
				if(result.length()>0 && result.charAt(result.length()-1) != ' ')
					result += " ";
				recordState = 3;
			}else if(currentChar==')'){
				paranthesesCount--;
				recordState = 1;
			}else if(recordState != 1){
				recordState = 2;
			}
			if(recordState==2){
				result+=currentChar;
			}
			if(paranthesesCount==0){
				lastIndex=ii;
				break;
			}
		}
		return "("+head+" "+result+") ";		
	}
}