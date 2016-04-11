import java.util.ArrayList;
import java.util.LinkedList;
import java.util.Queue;

import com.sleepycat.je.tree.Tree;

public class TreeNode {
	public String label;
	public String value;
	public TreeNode parent;
	public ArrayList<TreeNode> childs = new ArrayList<TreeNode>();
	public int level = -1;

	public TreeNode() {

	}
	
	public TreeNode(String value) {
		this.value = value;
	}
	
	public static void main(String[] args) {
		TreeNode node = new TreeNode();
		System.out.println(node.getChildrenOfLv2());
	}

	public TreeNode addNode() {
		TreeNode node = new TreeNode();
		childs.add(node);
		return node;
	}
	
	public TreeNode addNode(String value) {
		TreeNode node = new TreeNode(value);
		childs.add(node);
		return node;
	}

	public void construct(String parseTree) {
		String tag = "";
		TreeNode head = this;
		for (int i = 0; i < parseTree.length(); i++) {
			char currentChar = parseTree.charAt(i);
//			System.out.println(head+", tag:"+tag+", isHVNull:"+(head.value==null));
			if (currentChar == '(') {
				TreeNode node = head.addNode();
				node.parent = head;
				head = node;
				head.level = node.parent.level+1;
//				tag += currentChar;
			} else if (currentChar == ' ' && tag.length()>0 ) { // check \ **double space
				if(head.label == null){
					head.label = tag;	
//					System.out.println("|"+tag);
				}else{
					head.value = tag;
				}
				tag = "";
			} else if (currentChar == ')') {
				if(head.value == null){
					head.value = tag;	
				}else{
//					System.out.println(head.value);
				}
				head = head.parent;
			} else if(currentChar != ' '){
				tag += currentChar;
			}
		}
	}
	
	public void levelOrder(){
		Queue queue = new LinkedList<TreeNode>();
		queue.add(this);
		while(!queue.isEmpty()){
			TreeNode thisNode = (TreeNode) queue.poll();
			for (TreeNode node : thisNode.childs) {
				queue.add(node);
			}
			System.out.println(thisNode);
		}
	}
	
	public String getChildrenOfLv2(){
		String result = "";
		Queue queue = new LinkedList<TreeNode>();
		queue.add(this);
		while(!queue.isEmpty()){
			TreeNode thisNode = (TreeNode) queue.poll();
			for (TreeNode node : thisNode.childs) {
				if(node.level==2){
					result += "{";
					result += node.getLeaves(node);
					result += "}/"+node.label+" ";
				}
				queue.add(node);
			}
			if(thisNode.level>2){
				return result;
			}
		}
		return result;
	}
	
	public String getLeaves(TreeNode startNode){
		String result = "";
		Queue queue = new LinkedList<TreeNode>();
		queue.add(startNode);
		while(!queue.isEmpty()){
			TreeNode thisNode = (TreeNode) queue.poll();
			for (TreeNode node : thisNode.childs) {
				queue.add(node);
			}
			if(thisNode.childs.size()==0){
				result+= thisNode.value+" ";
			}
		}
		return result;
	}
	
	@Override
	public String toString() {
		return "label:"+this.label+", value:"+this.value+", level:"+this.level;
	}

}
